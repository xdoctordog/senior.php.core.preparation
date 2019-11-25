<?php

/**
 * XSLTProccessor используется для того чтобы получив на входе xml файл и xsl схему
 * ( которая я вляется шаблоном на основе которого будет построен выходной XML|HTML файл).
 * XSL файлик содержит помимо разметки для выходного файла, также XPATH запросы к XML документу
 * Из которого будут извлечены данные по этим XPATH запросам.
 */

$xml = new DOMDocument();
$xmlStream = '<feed ___xmlns="http://www.w3.org/2005/Atom" xml:lang="en">
    <title>Using XPath with PHP</title>
    <author><name>Tracy Bost</name></author>
    <subtitle type="html">
        Let XPath do the hard work for you when working with XML</subtitle>
    <link rel="self" type="text/html"
          hreflang="en" href="http://www.ibm.com/developerworks/"/>
    <updated>15 Aug 2011 22:51:48 +0000</updated>
    <entry>
        <title>SimpleXML and XPath </title>
        <summary>If you are using SimpleXML to parse XML or
            RSS feeds, XPath is great to use!</summary>
        <link rel="self" type="text/html" hreflang="en" href=""/>
        <published>21 Apr 2011 04:00:00 +0000</published>
        <updated>21 Apr 2011 04:00:00 +0000</updated>
    </entry>
    <entry>
        <title>DOMXPath</title>
        <summary>If you are using DOM for traversal XML documents,
            give DOMXPath a try! </summary>
        <link rel="self" type="text/html" hreflang="en" href=""/>
        <id>tag:developerWorks.dw,19 Apr 2011 04:00:00 +0000</id>
        <published>12 Aug 2011 04:00:00 +0000</published>
        <updated>12 Aug 2011 04:00:00 +0000</updated>
    </entry>
    <entry>
        <title>XMLReader with XPath</title>
        <summary>For complex XML document reading and writing,
            using XPath with XReader can ease your burden!</summary>
        <link rel="self" type="text/html" hreflang="en" href=""/>
        <id>tag:developerWorks.dw,19 Apr 2011 04:00:00 +0000</id>
        <published>08 Aug 2011 04:00:00 +0000</published>
        <updated>08 Aug 2011 04:00:00 +0000</updated>
    </entry>
</feed>';

$xml->loadXML($xmlStream);

$xsl = new DOMDocument();
$xsl->load( './article_feed.xsl');

$xslt = new XSLTProcessor();
$xslt->importStylesheet($xsl);
$outXml = $xslt->transformToXML($xml);
var_dump($outXml);
