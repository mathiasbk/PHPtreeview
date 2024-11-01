<html>
<head>
    <meta charset="utf-8">
    <title>PHPTreeview</title>

    <link rel="stylesheet" href="src/Style.css">

</head>
<body>
<?php

$statusArray = array(
            array(
                'id' => 1,
                'name' => 'Root',
                'children' => array(
                    array(
                        'id' => 2,
                        'name' => 'child  1',
                        'children' => array(
                            array(
                                'id' => 3,
                                'name' => 'granchild 1',
                                'children' => array()
                            ),
                            array(
                                'id' => 4,
                                'name' => 'granchild 2',
                                'children' => array()
                            )
                        )
                    ),
                    array(
                        'id' => 5,
                        'name' => 'child 2',
                        'children' => array()
                    )
                )
            )
        );

require_once("src/PHPTreeview.php");

$treeview = new PHPTreeView();

//Add buttons
$treeview->AddButton('Edit', 'edit.php', 'btn btn-primary');

//display the treeview
echo $treeview->buildTreeView($statusArray);

?>
</body>
</html>