<?php
namespace Trekksoft;

class PassengerTicket
{
    /**
     * Passenger name
     * @var string
     */
    protected $passengerName;

    /**
     * Tour title
     * @var string
     */
    protected $tourTitle;

    /**
     * Date and time for the ticket
     *
     * @var \DateTime
     */
    protected $dateTime;

    /**
     * Ticket price
     *
     * @var string
     */
    protected $price;

    /**
     * @param $passengerName
     * @param $tourTitle
     * @param $price
     * @param DateTime $dateTime
     */
    public function __construct($passengerName, $tourTitle, $price, \DateTime $dateTime)
    {
        $this->passengerName = $passengerName;
        $this->tourTitle = $tourTitle;
        $this->price = $price;
        $this->dateTime = $dateTime;
    }

    /**
     * Return string representation of the passenger ticket
     *
     * @return string
     */
    public function __toString()
    {
        return
            'Name: '.$this->passengerName."\n".
            'Tour: '.$this->tourTitle."\n".
            'Date: '.$this->dateTime->format('d F Y \a\t H:i\h')."\n".
            'Price: '.$this->price."\n";
    }

    /**
     * @param \DateTime $dateTime
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @param string $passengerName
     */
    public function setPassengerName($passengerName)
    {
        $this->passengerName = $passengerName;
    }

    /**
     * @return string
     */
    public function getPassengerName()
    {
        return $this->passengerName;
    }

    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $tourTitle
     */
    public function setTourTitle($tourTitle)
    {
        $this->tourTitle = $tourTitle;
    }

    /**
     * @return string
     */
    public function getTourTitle()
    {
        return $this->tourTitle;
    }
}