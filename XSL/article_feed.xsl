<?xml version='1.0'?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head><title><xsl:value-of select="//title"/></title></head>
            <table>
                <tr><td><xsl:value-of select="//title"/></td></tr>
                <tr><td><i>"<xsl:value-of select="//subtitle" />",</i></td></tr>
                <tr><td>by <xsl:value-of select="//author" /></td></tr>
                <xsl:for-each select="//feed/entry">
                <table border="1" >
                    <tr>
                        <td>Title</td><td><xsl:value-of select="title"/></td>
                    </tr>
                    <tr>
                        <td>Summary</td><td><xsl:value-of select="summary"/></td>
                    </tr>
                    <tr>
                    </tr>
                </table><br/>
            </xsl:for-each>
        </table>
    </html>
</xsl:template>
</xsl:stylesheet>
