<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST["name"];
    $login = $_POST["login"];
    $password = $_POST["password"];
    $date = date('Y-m-d H:i:s');
    if (isset($_POST["saveAsTxt"]))
    {
        saveAsTxt($name, $login, $password, $date);
    }
    elseif (isset($_POST["saveAsXml"]))
    {
        saveAsXml($name, $login, $password, $date);
    }
}
function saveAsTxt($name, $login, $password, $date)
{
    $filename = "data.txt";
    $data = "$date; Name: $name; Login: $login; Password: $password;\n";
    file_put_contents($filename, $data, FILE_APPEND);
    echo "Data saved to Txt file.";
}
function saveAsXml($name, $login, $password, $date)
{
    $filename = "data.xml";
    if (!file_exists($filename))
    {
        $xml = new SimpleXMLElement('<?xml version="1.0"?><users></users>');
    }
    else
    {
        $xml = simplexml_load_file($filename);
    }
    $user = $xml->addChild('user');
    $user->addChild('date', $date);
    $user->addChild('name', $name);
    $credentials = $user->addChild('credentials');
    $credentials->addChild('login', $login);
    $credentials->addChild('password', $password);
    $xml->asXML($filename);
    echo "Data saved to Xml file.";
}