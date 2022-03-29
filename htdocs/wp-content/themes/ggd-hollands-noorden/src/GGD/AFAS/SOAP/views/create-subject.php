<ns1:Execute>
    <ns1:token>
        <![CDATA[{{token}}]]>
    </ns1:token>
    <ns1:connectorType>KnSubject</ns1:connectorType>
    <ns1:connectorVersion>1</ns1:connectorVersion>
    <ns1:dataXml>
        <![CDATA[
            <KnSubject xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                <Element>
                    <Fields Action="insert">
                        <StId>95</StId>
                        <Ds>Klacht</Ds>
                        <FvF1>255</FvF1>
                    </Fields>
                    <Objects>
                        <KnSubjectLink>
                            <Element>
                                <Fields Action="insert">
                                    <DoCRM>true</DoCRM>
                                    <ToBC>true</ToBC>
                                    <BcId>{{bcCo}}</BcId>
                                </Fields>
                            </Element>
                        </KnSubjectLink>
                    </Objects>
                    <Objects>
                        <KnS28>
                            <Element>
                                <Fields Action="insert">
                                    <U80829968453EF4E4AA0F93B1283C587A><?php echo date('Y-m-d') ?></U80829968453EF4E4AA0F93B1283C587A>
                                    <UA3E3ED1F49B6FF686C834184C5AE4E87><?php echo date("Y-m-d", strtotime("+6 week")) ?></UA3E3ED1F49B6FF686C834184C5AE4E87>
                                    <UD9EA11CE45679BAC443173A657E0A2B2>{{complaint}}</UD9EA11CE45679BAC443173A657E0A2B2>
                                </Fields>
                            </Element>
                        </KnS28>
                    </Objects>
                </Element>
            </KnSubject>
        ]]>
    </ns1:dataXml>
</ns1:Execute>