<?php 

namespace mathiasbk\phptreeview;
Class phptreeview {
    
    private $buttons = array();


    public static function Createphptreeview()
    {
        $phptreeview = new self();

        return $phptreeview;
    }
    public function buildTreeView($nodes) {
        $tree = '<div class="tree">';
        $tree .= '<ul>';
    
        foreach ($nodes as $node) {
            
            $tree .= '<li>';
            $tree .= '<span class="node" data-group-id="' . $node['id'] . '">' . htmlspecialchars($node['name']) . '</span>';
            
            //add buttons
            if(sizeof($this->buttons) > 0) {
                $tree .= '<span class="float-end">';
                $tree .= $this->GetButtons();
                $tree .= '</span>'; 
            }

            
            if(sizeof($node['children']) > 0) {
                $tree .= $this->buildTreeView($node['children']);
            }

            $tree .= '</li>';
            
        }
    
        $tree .= '</ul></div>';
        return $tree;
    }


    function AddButton($buttontext, $buttonlink, $buttonclass) {

        $button = new Button($buttontext, $buttonlink, $buttonclass);
        array_push($this->buttons, $button);
    }

    //Genereat HTML outfor for all buttons
    function GetButtons()
    {
        $buttonshtml ="";
        foreach($this->buttons as $button) {
            $buttonshtml .= "<a href=\"$button->buttonlink\" class=\"btn btn-sm btn-success add-group me-2 $button->buttonclass\" data-parent-id=\"\">$button->buttontext</a>";
        }
    
        return $buttonshtml;
    }

    public function testdata()
    {
        $statusArray = array(
            array(
                'id' => 1,
                'name' => 'Rot',
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
        return $statusArray;
    }
    
}

class Button
{
    public $buttontext;
    public $buttonlink;
    public $buttonclass;
    public $parent_id;

    function __construct($buttontext, $buttonlink, $buttonclass)
    {
        $this->buttontext = $buttontext;
        $this->buttonlink = $buttonlink;
        $this->buttonclass = $buttonclass;
    }
}