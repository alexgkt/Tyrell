<?php
/**
 * Class Deck
 */
class Deck
{
    /**
     * Suites array
     * @var string[]
     */
    private $suites;

    /**
     * Cards array
     * @var string[]
     */
    private $cards;

    /**
     * Deck array
     * @var string[]
     */
    private $deck;

    /**
     * Deck constructor.
     */
    public function __construct()
    {
        // Assign Spade, Hearts, Diamond, Club to suits array
        $this->suites = ['S', 'H', 'D', 'C'];

        // Assign 1-13 to cards array
        $this->cards = ['A', '2', '3', '4', '5', '6', '7', '8', '9', 'X', 'J', 'Q', 'K'];

        // Populate deck array
        foreach($this->suites as $suite) {
            foreach ($this->cards as $card) {
                $this->deck[] = $suite . '-' . $card;
            }
        }
    }

    public function get_deck() {
        return $this->deck;
    }

    /**
     * Assign cards to stipulated number of pax
     * @param $pax_num
     * @return array
     */
    public function assign_cards($pax_num)
    {
        $deck = $this->deck;
        // count total cards in deck
        $total_cards = count($deck);
        // count total cards per pax
        $cards_per_pax = floor($total_cards / $pax_num);
        // Initiate $output
        $output = [];

        // Iterate through the number of pax
        for ($i = 0; $i < $pax_num; $i++) {
            // Reset $deck indexes after first iteration
            $cards = (array)array_rand($deck, $cards_per_pax); // cast (array) to mitigate array_rand returning string on single value
            foreach($cards as $card) {
                // Assign selected cards to $output
                $output[$i][] = $deck[$card];
                // Remove assigned cards from $deck array
                //array_splice($deck, $card, 1);
                unset($deck[$card]);
            }
        }

        return $output;
    }
}