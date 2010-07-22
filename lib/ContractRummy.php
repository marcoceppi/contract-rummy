<?php

// Trying to figure out if I need a "Player" class or to contain in this class
// Logic dictages Yes I do - though might not need it now.
class ContractRummy extends Cards
{
	function ContractRummy( $players = 2)
	{
		
	}
}

class Cards
{
	protected $deck = array();
	
	function Cards( $decks = 1, $jokers = 0 )
	{
	
	}
	
	/**
	 * Shuffle cards to create random order
	 *
	 * @return void
	 */
	function shuffle()
	{
		if( $this->total() > 0 )
		{
			shuffle($this->deck);
		}
	}
	
	/**
	 * Deal one card from top of the deck
	 *
	 * @return Card|false
	 */
	function deal()
	{
		return ($this->total() > 0) ? array_shift($this->deck) : false;
	}
	
	/**
	 * Total cards left
	 *
	 * @return int
	 */
	function total()
	{
		return count($this->deck);
	}
}

class Card
{
	function Card()
	{
		
	}
}
