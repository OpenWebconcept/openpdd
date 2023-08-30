<?php declare(strict_types=1);

namespace App\Security;

class CSP
{
    protected string $content;

    protected string $nonceScript;

    protected string $nonceStyle;

    private function __construct(string $content, string $nonceScript, string $nonceStyle)
    {
        $this->content = $content;
        $this->nonceScript = $nonceScript;
        $this->nonceStyle = $nonceStyle;
    }

    public static function make(string $content, string $nonceScript, $nonceStyle): self
    {
        return new static($content, $nonceScript, $nonceStyle);
    }

    public function add(): string
    {
        $content = preg_replace($this->getScriptRegex(), "<$1 nonce=\"{$this->getNonceScript()}\"$2>", $this->content);
        $content = preg_replace($this->getStyleRegex(), "<$1 nonce=\"{$this->getNonceStyle()}\"$2>", $content);
        $content = preg_replace($this->getHTMLRegex(), "$1nonce=\"{$this->getNonceScript()}\" $2", $content);
        //$content = preg_replace($this->getInlineStyleRegex(), '$1nonce=${3}' . $this->getNonceStyle() .'$3 $2', $content);
        return $content;
    }

    protected function getScriptRegex(): string
    {
        return '/<(script)((?:(?!nonce).)*?)>/';
    }

    protected function getStyleRegex(): string
    {
        return '/<(style)((?:(?!nonce).)*?)>/';
    }

    protected function getInlineStyleRegex(): string
    {
        return '/(<[^>]*?)(style\s*?=\s*?(?:(\'|"))(?:[^>](?:(?!nonce).)*?>))/';
    }

    protected function getHTMLRegex(): string
    {
        return '/(<[^>]*)(on(?:change|click|mouseover|mouseout|keydown|load)\s*=\s*(?:\'|")(?:[^>](?:(?!nonce).)*>))/';
    }

    /**
     * Get the value of script nonce.
     */
    public function getNonceScript(): string
    {
        return $this->nonceScript;
    }

    /**
     * Get the value of style nonce.
     */
    public function getNonceStyle(): string
    {
        return $this->nonceStyle;
    }
}
