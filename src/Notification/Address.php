<?php
namespace Oka\NotifierBundle\Notification;

/**
 *
 * @author Cedrick Oka Baidai <cedric.baidai@veone.net>
 *
 */
class Address
{
	private $name;
	private $value;
	
	public function __construct(string $value, string $name = null)
	{
		$this->name = $name;
		$this->value = $value;
	}
	
	public function getName() :?string
	{
		return $this->name;
	}
	
	public function getValue() :string
	{
		return $this->value;
	}
	
	public function toArray()
	{
		$address = ['value' => $this->value];
		
		if (null !== $this->name) {
			$address['name'] = $this->name;
		}
		
		return $address;
	}
	
	public function __toString()
	{
		if (null === $this->name) {
			return $this->value;
		}
		
		return sprintf('%s <%s>', $this->name, $this->value);
	}
	
	public static function create($address) :self
	{
	    if (true === is_string($address)) {
	        return new self($address);
	    }
	    
	    return new self($address['value'], $address['name'] ?? null);
	}
}
