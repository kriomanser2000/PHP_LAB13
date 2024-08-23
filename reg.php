<?php
$txtData = getTxtData();
$xmlData = getXmlData();
$allData = array_merge($txtData, $xmlData);
usort($allData, function($a, $b)
{
    return strtotime($a['date']) - strtotime($b['date']);
});
echo "<h2>All Records</h2>";
foreach ($allData as $record)
{
    echo "<p>Date: " . $record['date'] . "<br>Name: " . $record['name'] . "<br>Login: " . $record['login'] . "<br>Password: " . $record['password'] . "</p><hr>";
}
function getTxtData()
{
    $filename = 'data.txt';
    $records = [];
    if (file_exists($filename))
    {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line)
        {
            list($date, $name, $login, $password) = explode('; ', $line);
            $records[] = [
                'date' => substr($date, 0, strpos($date, ';')),
                'name' => substr($name, strpos($name, ':') + 2),
                'login' => substr($login, strpos($login, ':') + 2),
                'password' => substr($password, strpos($password, ':') + 2)
            ];
        }
    }
    return $records;
}
function getXmlData()
{
    $filename = 'data.xml';
    $records = [];
    if (file_exists($filename))
    {
        $xml = simplexml_load_file($filename);
        foreach ($xml->user as $user)
        {
            $records[] = [
                'date' => (string)$user->date,
                'name' => (string)$user->name,
                'login' => (string)$user->credentials->login,
                'password' => (string)$user->credentials->password
            ];
        }
    }
    return $records;
}