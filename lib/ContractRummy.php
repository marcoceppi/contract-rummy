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
	private $suites = array("clubs", "diamonds", "spades", "hearts");
	private $faces  = array("A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K");
	
	protected $playing_deck = array();
	
	/**
	 * Constructor for Cards
	 * 
	 * This will create the initial playing deck of cards
	 * 
	 * @param int $decks How many decks of cards to use. Must be greater than 0
	 * @param int $jokers How many Jokers are found in a single "deck". Must be greater than 0
	 * 
	 * @return boolean
	 */
	function Cards( $decks = 1, $jokers = 0 )
	{
		$decks  = ( $decks < 1 ) ? 1 : $decks; // Lets not be silly now
		$jokers = ( $jokers < 0 ) ? 0 : $jokers; // Really now - no negatives
		
		$faces_total = count($faces) + $jokers;
		$deck_total  = $faces_total * count($suites);
		
		// Build the playing deck
		for( $i = 0; $i < $decks; $i++ )
		{
			foreach( $faces as $face )
			{
				foreach( $suites as $suite )
				{
					$this->playing_deck[] = array( "suite" => $suite, "face" => $face );
				}
			}
		}
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
			shuffle($this->playing_deck);
		}
	}
	
	/**
	 * Deal one card from top of the deck
	 *
	 * @return Card|false
	 */
	function deal()
	{
		return ($this->total() > 0) ? array_shift($this->playing_deck) : false;
	}
	
	/**
	 * Total cards left
	 *
	 * @return int
	 */
	function total()
	{
		return count($this->playing_deck);
	}
}
