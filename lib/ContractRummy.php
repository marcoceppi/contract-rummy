<?php

class ContractRummy extends Cards
{
	protected $sets = array();
	protected $runs = array();
	
	function ContractRummy( $players = 2 )
	{
		parent::Cards( 2, 0 );
	}
	
	function addSet( /* Variable Length */ )
	{
		$total_cards = func_num_args();
		
		if( $total_cards < 3 )
		{
			return false;
		}
		else
		{
			// Check if all cards are of the same Face
		}
	}
	
	function addRun( /* Variable Length */ )
	{
		$total_cards = func_num_args();
		
		if( $total_cards < 4 )
		{
			return false;
		}
		else
		{
			// Check if all cards are of the same Suite and sequential
		}
	}
	
	function addToSet( $set_id, $card )
	{
		
	}
	
	function addToRun( $run_id, $card )
	{
		
	}
}

class ContractPlayer extends Player
{
	private $contract_fulfilled = false;
	
	function ContractPlayer()
	{
		parent::Player();
	}
	
	function metContract()
	{
		return $this->contract_fulfilled; 
	}
	
	function fulfilledContract()
	{
		$this->contract_fulfilled = true;
	}
}

class Player
{
	protected $hand = array();
	
	function Player()
	{
		
	}
	
	function getHand()
	{
		return $this->hand;
	}
	
	function addToHand( $card )
	{
		if( !is_array($card) )
		{
			return false;
		}
		else
		{
			$this->hand[] = $card;
			return true;
		}
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
		
		// Build the playing deck
		for( $i = 0; $i < $decks; $i++ )
		{
			foreach( $this->faces as $face )
			{
				foreach( $this->suites as $suite )
				{
					$this->playing_deck[] = array( "face" => $face, "suite" => $suite );
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
