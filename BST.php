<?php
class BST
{
	public $root;
	public function __construct()
	{
		$this->root = null;
	}
	public function insert($val)
	{
		if ($this->root == null)
		{
			$this->root = new Node($val);
		} else
		{
			$this->ins($val,$this->root);
		}
		return $this;
	}
	private function ins($val, $node)
	{
		if (!$node)
		{
			return new Node($val);
		} else 
			if ($val < $node->val)
			{
				$node->left = $this->ins($val,$node->left);
			} else
			{
				$node->right = $this->ins($val,$node->right);
			}
		return $node;
	}
	public function printOut()
	{
		$this->pO($this->root);
		return $this;
	}
	private function pO($node)
	{
		if ($node)
		{
			$this->pO($node->left);
			echo $node->val . " ";
			$this->pO($node->right);
		}
	}
}
class Node
{
	public $val, $left, $right;
	public function __construct($val, $left = null, $right = null)
	{
		$this->val = $val;
		$this->right = $right;
		$this->left = $left;
	}
}
$bst = new BST();
$time1 = microtime();
for($n = 0; $n < 10000; $n ++)
{
	$val = rand(0,1000);
	$bst->insert($val);
}
$bst->printOut();
$time2 = microtime();
echo "<br/>Here are the results, it took ".($time2 - $time1)." microseconds to process them";

?>