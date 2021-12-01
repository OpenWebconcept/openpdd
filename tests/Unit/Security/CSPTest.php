<?php declare(strict_types=1);

namespace Tests\Unit\Security;

use App\Security\CSP;
use Mockery as m;
use Tests\TestCase;
use WP_Mock;

class CSPTest extends TestCase
{
    protected function setUp(): void
    {
        WP_Mock::setUp();
    }

    protected function tearDown(): void
    {
        WP_Mock::tearDown();
        m::close();
    }

    /** @test */
    public function that_csp_is_setup_correctly()
    {
        $content = 'content string';
        $nonceScript = 'nonce script string';
        $nonceStyle = 'nonce style string';
        $csp = CSP::make($content, $nonceScript, $nonceStyle);
        $this->assertStringContainsString('nonce script string', $csp->getNonceScript());
        $this->assertEquals('nonce script string', $csp->getNonceScript());

        $this->assertStringContainsString('nonce style string', $csp->getNoncestyle());
        $this->assertEquals('nonce style string', $csp->getNonceStyle());
    }

    /** @test */
    public function that_nonce_is_injected_into_script_tags()
    {
        $content = '<html lang="nl"><head><script type="text/javascript">document.body.className = document.body.className.replace("no-js","js");</script>';
        $nonceScript = '1234567890';
        $csp = CSP::make($content, $nonceScript, '');
        $expected = '<html lang="nl"><head><script nonce="1234567890" type="text/javascript">document.body.className = document.body.className.replace("no-js","js");</script>';
        $this->assertStringContainsString('nonce="1234567890"', $csp->add());
        $this->assertEquals($expected, $csp->add());
    }

    /** @test */
    public function that_nonce_is_not_injected_twice_into_script_tags()
    {
        $content = '<html lang="nl"><head><script nonce="987654321" type="text/javascript">document.body.className = document.body.className.replace("no-js","js");</script>';
        $nonceScript = '1234567890';
        $csp = CSP::make($content, $nonceScript, '');
        $expected = '<html lang="nl"><head><script nonce="987654321" type="text/javascript">document.body.className = document.body.className.replace("no-js","js");</script>';
        $this->assertStringContainsString('nonce="987654321"', $csp->add());
        $this->assertEquals($expected, $csp->add());
    }

    /** @test */
    public function that_nonce_is_injected_into_inline_style_tags()
    {
        $content = '<style>li {display: block;}</style>
        <style type="text/css" media="print">{ display:none; }</style>';
        $nonceStyle = '1234567890';
        $csp = CSP::make($content, '', $nonceStyle);
        $expected = '<style nonce="1234567890">li {display: block;}</style>
        <style nonce="1234567890" type="text/css" media="print">{ display:none; }</style>';
        $this->assertStringContainsString('nonce="1234567890"', $csp->add());
        $this->assertEquals($expected, $csp->add());
    }

    /** @test */
    public function that_nonce_is_not_injected_twice_into_inline_style_tags()
    {
        $content = '<style nonce="9876543210">li {display: block;}</style>
        <style type="text/css" media="print">{ display:none; }</style>';
        $nonceStyle = '1234567890';
        $csp = CSP::make($content, '', $nonceStyle);
        $expected = '<style nonce="9876543210">li {display: block;}</style>
        <style nonce="1234567890" type="text/css" media="print">{ display:none; }</style>';
        $this->assertStringContainsString('nonce="1234567890"', $csp->add());
        $this->assertEquals($expected, $csp->add());
    }

    /** @test */
    public function that_nonce_is_injected_into_inline_html_tags()
    {
        $content = '<div id="some_id" class="some_class" style="display:none;"><a onclick="$(this).next().fadeIn(); return false;"></a></div>';
        $nonceScript = '1234567890';
        $csp = CSP::make($content, $nonceScript, '');
        $expected = '<div id="some_id" class="some_class" nonce="" style="display:none;"><a nonce="1234567890" onclick="$(this).next().fadeIn(); return false;"></a></div>';
        $this->assertStringContainsString('nonce="1234567890"', $csp->add());
        $this->assertEquals($expected, $csp->add());
    }

    /** @test */
    public function that_nonce_is_not_injected_twice_into_inline_html_tags()
    {
        $content = '<div id="some_id" class="some_class" style="display:none;" nonce="9876543210">
            <a onclick="$(this).next().fadeIn(); return false;"></a>
        </div>';
        $nonceScript = '1234567890';
        $csp = CSP::make($content, $nonceScript, '');
        $expected = '<div id="some_id" class="some_class" style="display:none;" nonce="9876543210">
            <a nonce="1234567890" onclick="$(this).next().fadeIn(); return false;"></a>
        </div>';
        $this->assertStringContainsString('nonce="1234567890"', $csp->add());
        $this->assertEquals($expected, $csp->add());
    }

    /** @test */
    public function that_nonce_is_add_to_inline_js()
    {
        $content = '<input type="button" id="form" class="form_next_button button" value="Next" onclick="jQuery("#form").val("2");" />';
        $nonceScript = '1234567890';
        $csp = CSP::make($content, $nonceScript, '');
        $expected = '<input type="button" id="form" class="form_next_button button" value="Next" nonce="1234567890" onclick="jQuery("#form").val("2");" />';
        $this->assertStringContainsString('nonce="1234567890"', $csp->add());
        $this->assertEquals($expected, $csp->add());
    }

    /** @test */
    public function that_nonce_is_correctly_injected_into_javascript()
    {
        $content = '<script type="text/javascript" id="test">
                    /* <![CDATA[ */
                    { "translations": {
                        <span class="aaa" style="font-size: 20px;margin-top:25px;display:block;font-family:Lato">xxx<\/span>",
                        <span class=\'bbb\' style=\'font-size: 20px;margin-top:25px;display:block;font-family:Lato\'>yyy<\/span>\'
                    }
                    /* ]]> */
                    </script>';
        $nonceScript = '1234567890';
        $nonceStyle = '0987654321';
        $csp = CSP::make($content, $nonceScript, $nonceStyle);
        $this->assertStringContainsString('<script nonce="1234567890" type="text/javascript" id="test">', $csp->add());
        $this->assertStringContainsString('<span class="aaa" nonce="0987654321" style="font-size: 20px;margin-top:25px;display:block;font-family:Lato">xxx<\/span>', $csp->add());
        $this->assertStringContainsString("<span class='bbb' nonce='0987654321' style='font-size: 20px;margin-top:25px;display:block;font-family:Lato'>yyy<\/span>", $csp->add());
    }
}
