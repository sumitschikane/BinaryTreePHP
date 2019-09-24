<?php 

include('BinaryNode.php');

class BinaryTree
{
    protected $root; // the root node of our tree

    public function __construct() 
    {
        $this->root = null;
    }

    public function isEmpty() 
    {
        return $this->root === null;
    }

    public function insert($item) 
    {
        $node = new BinaryNode($item);

        if($this->isEmpty()) {
            // special case if tree is empty
            $this->root = $node;
        } else {
            // insert node somewhere in the tree starting at the root
            $this->insertNode($node, $this->root);
        }
    }

    protected function insertNode($node, &$subtree) 
    {
        if($subtree === null) {
            //insert node here if subtree is empty
            $subtree = $node;
        } else {
            if($node->value > $subtree->value) {
                // keep trying to insert right
                $this->insertNode($node, $subtree->right);
            } else if($node->value < $subtree->value) {
                // keep trying to insert left
                $this->insertNode($node, $subtree->left);
            } else {
                // reject duplicates
            }
        }
    }

    public function traverse()
    {
        // dump the tree rooted at "root"
        $this->root->dump();
    }
}


// unit tests
$tree = new BinaryTree;
$tree->insert(20);
$tree->insert(15);
$tree->insert(25);
$tree->insert(10);
$tree->insert(18);
$tree->insert(5);
$tree->insert(28);
echo "<pre>";
var_dump($tree);
var_dump($tree->traverse());