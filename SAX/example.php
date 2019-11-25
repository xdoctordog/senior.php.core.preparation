<?php

/**
 * SAX -- Simple API for XML
 * SAX provides events on 'Tag starts' and 'Tag ends'
 * It helps to process practically unlimited size of XML files
 */

//Reading XML using the SAX(Simple API for XML) parser
$courses = [];
$currentElement = null;
$iCourse = 0;
// Called to this function when tags are opened
function startElements($parser, $name, $attrs) {
    global $courses, $currentElement, $iCourse;
    if(!empty($name)) {
        // When we found new course element
        if ($name == 'COURSE') {
            $courses[$iCourse]= [];
            $iCourse ++;
        }
        $currentElement = $name;
    }
}

// This function is called when tags are closed
function endElements($parser, $name) {
    global $currentElement;
    if(!empty($name)) {
        $currentElement = null;
    }
}

// Called on the text between the start and end of the tags
function characterData($parser, $text) {
    global $courses, $currentElement;
    switch ($currentElement) {
        case 'NAME':
        case 'COUNTRY':
        case 'EMAIL':
        case 'PHONE':
            $courses[count($courses)-1][$currentElement] = $text;
            break;
    }
}

// Creates a new XML parser and returns a resource handle referencing it to be used by the other XML functions.
$parser = xml_parser_create();

xml_set_element_handler($parser, "startElements", "endElements");
xml_set_character_data_handler($parser, "characterData");

// open xml file
if (!($handle = fopen('./sax.xml', "r"))) {
    die("could not open XML input");
}

// read xml file
while($data = fread($handle, 4096)) {
    xml_parse($parser, $data);  // start parsing an xml document
}

xml_parser_free($parser); // deletes the parser
$i = 1;

foreach($courses as $course) {
    echo "Course No: ".$i.'<br/>';
    echo "Course Name: ".$course['NAME'].'<br/>';
    echo "Country: ".$course['COUNTRY'].'<br/>';
    echo "Email: ".$course['EMAIL'].'<br/>';
    echo "Phone: ".$course['PHONE'].'<hr/>';
    $i++;
}
