<?php

/**
 * Read info from processor stream.
 */
function procStat()
{
    $stats = @file_get_contents("/proc/stat");
    echo "<pre>";
    print_r($stats);
    echo "</pre>";
}

/**
 * Check memory usage.
 * @param $line
 */
function checkMemoryUsage($line) {
    echo "<pre>";
    echo "<h2>LINE: " . $line . "</h2>";
    echo "<h3>memory_get_usage:</h3>";
    var_dump(memory_get_usage());
    echo "<h3>memory_get_peak_usage:</h3>";
    var_dump(memory_get_peak_usage());
    echo "<h3>sys_getloadavg:</h3>";
    var_dump(sys_getloadavg());
    procStat();
}

/**
 * Create big xml file.
 * @param string $fileName
 */
function createOneGbXmlFile($fileName = './big.xml')
{
    $f = fopen($fileName, 'w+b');
    checkMemoryUsage(__LINE__);
    $startStrXml =
        "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>
<products>
    <last_updated>2019-11-30 10:13:00</last_updated>
    <product_container>";
    checkMemoryUsage(__LINE__);
    fwrite($f, $startStrXml);
    checkMemoryUsage(__LINE__);
    $strXml = "
        <product>
            <name>Cap</name>
            <price>10$</price>
        </product>
        <product>
            <name>Hat</name>
            <price>12$</price>
        </product>
        <product>
            <name>T-shirt</name>
            <price>15$</price>
        </product>
        <product>
            <name>Trousers</name>
            <price>17$</price>
        </product>
        <product>
            <name>Socks</name>
            <price>7$</price>
        </product>
        <product>
            <name>Jeans</name>
            <price>27$</price>
        </product>
        <product>
            <name>Clocks</name>
            <price>37$</price>
        </product>";
    checkMemoryUsage(__LINE__);
    for ($i = 0; $i < 2000000; $i ++) {
        fwrite($f, $strXml);
    }
    checkMemoryUsage(__LINE__);
    $endStrXml = "
    </product_container>
</products>";
    checkMemoryUsage(__LINE__);
    fwrite($f, $endStrXml);
    checkMemoryUsage(__LINE__);
    fclose($f);
    checkMemoryUsage(__LINE__);

    unset($startStrXml);
    unset($strXml);
    unset($endStrXml);
    checkMemoryUsage(__LINE__);
    unset($fileName);
    checkMemoryUsage(__LINE__);

}
class Node {
    private $level;
    private $tag;

    public function __construct($tag, $level)
    {
        $this->tag = $tag;
        $this->level = $level;
    }

    public function setLevel($level) {
        $this->level = $level;
    }

    public function getLevel() {
        return $this->level;
    }

    public function setTag($tag) {
        $this->tag = $tag;
    }

    public function getTag() {
        return $this->tag;
    }
}

function readXmlFile($folderName = './', $fileName = 'big.xml')
{
    $nodes = [];
    $fOutput = fopen($folderName . 'output_' . $fileName . '.txt', 'w+b');
    $xmlFileReader = new XMLReader;
    $xmlFileReader->open($folderName . $fileName);
    $currentNodeNumber = 0;

    while ($xmlFileReader->read()) {
        if($xmlFileReader->nodeType === XMLReader::END_ELEMENT) {
            // Если закрылся тег который находится по нужному пути, то и мы должны забыть о нем
            if ($nodes[$currentNodeNumber]->getTag() === $xmlFileReader->name) {
                unset($nodes[$currentNodeNumber]);
                $currentNodeNumber --;
            }
            continue;
        }

        // First level with tag name 'products'
        if ($xmlFileReader->name === 'products' && $xmlFileReader->depth === 0) {
            $currentNodeNumber ++;
            $nodes[$currentNodeNumber] = new Node($xmlFileReader->name, $xmlFileReader->depth);
            // Если мы нашли уровень вложенности то в этом проходе делать больше ничего не нужно.
            continue;
        }

        // Если найден предыдущий уровень
        if (($nodes[$currentNodeNumber]->getTag() === 'products' && $nodes[$currentNodeNumber]->getLevel() === 0)
            &&
            // Second level with tag name 'product_container'
            ($xmlFileReader->name === 'product_container' && $xmlFileReader->depth === 1)) {
            $currentNodeNumber ++;
            $nodes[$currentNodeNumber] = new Node($xmlFileReader->name, $xmlFileReader->depth);
            continue;
        }
        if (($nodes[$currentNodeNumber]->getTag() === 'product_container' && $nodes[$currentNodeNumber]->getLevel() === 1)
            &&
            // Third level with tag name 'product'
            ($xmlFileReader->name === 'product' && $xmlFileReader->depth === 2)) {
            $currentNodeNumber ++;
            $nodes[$currentNodeNumber] = new Node($xmlFileReader->name, $xmlFileReader->depth);
            continue;
        }
        if (
            // Если на предыдущем обходе был более высокий уровень
            ($nodes[$currentNodeNumber]->getTag() === 'product' && $nodes[$currentNodeNumber]->getLevel() === 2)
            &&
            // Fourth level with tag name 'price' or 'name'
            (($xmlFileReader->name === 'price' || $xmlFileReader->name === 'name') && $xmlFileReader->depth === 3)
        ) {
            $currentNodeNumber ++;
            $nodes[$currentNodeNumber] = new Node($xmlFileReader->name, $xmlFileReader->depth);
            continue;
        }
        $tag = $nodes[$currentNodeNumber]->getTag();
        if (
            ( $tag === 'price' || $tag === 'name')
            &&
            ($nodes[$currentNodeNumber]->getLevel() === 3)
        ) {
            switch ($xmlFileReader->nodeType) {
                case XMLReader::TEXT:
                    $tag = $nodes[$currentNodeNumber]->getTag();
                    $value = $xmlFileReader->value;
                    fputs($fOutput, $tag . ':' . $value . "\n");
                    break;
            }
            // Если прочитали/получили значение то нужно удалить элемент из массива
            unset($nodes[$currentNodeNumber]);
            $currentNodeNumber --;
        }
    }
    fclose($fOutput);
}

//createOneGbXmlFile();

checkMemoryUsage(__LINE__);
readXmlFile('./', 'big.xml');
checkMemoryUsage(__LINE__);
