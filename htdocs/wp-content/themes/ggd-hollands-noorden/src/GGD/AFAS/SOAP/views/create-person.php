<ns1:Execute>
    <ns1:token>
        <![CDATA[{{token}}]]>
    </ns1:token>
    <ns1:connectorType>KnPerson</ns1:connectorType>
    <ns1:connectorVersion>1</ns1:connectorVersion>
    <ns1:dataXml>
        <![CDATA[
            <KnPerson xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                <Element>
                    <Fields Action="insert">
                        <PadAdr>1</PadAdr>
                        <AutoNum>1</AutoNum>
                        <MatchPer>7</MatchPer>
                        <SeNm></SeNm>
                        <CaNm></CaNm>
                        <FiNm>{{firstName}}</FiNm>
                        <In></In>
                        <Is>{{lastNamePrefix}}</Is>
                        <LaNm>{{lastName}}</LaNm>
                        <ViGe>{{gender}}</ViGe>
                        <MbNr></MbNr>
                        <MbN2>{{phonenumber}}</MbN2>
                        <EmAd></EmAd>
                        <EmA2>{{email}}</EmA2>
                    </Fields>
                    <Objects>
                        <KnBasicAddressAdr>
                            <Element>
                                <Fields Action="insert">
                                    <CoId>NL</CoId>
                                    <PbAd>0</PbAd>
                                    <Ad>{{street}}</Ad>
                                    <HmNr>{{housenumber}}</HmNr>
                                    <ZpCd>{{postalCode}}</ZpCd>
                                    <Rs>{{city}}</Rs>
                                    <AdAd></AdAd>
                                    <ResZip>0</ResZip>
                                </Fields>
                            </Element>
                        </KnBasicAddressAdr>
                    </Objects>
                </Element>
            </KnPerson>
        ]]>
    </ns1:dataXml>
</ns1:Execute>