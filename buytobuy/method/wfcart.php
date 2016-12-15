<?php
/*
######################################################################
# __      __          __         ___                                 #
#/\ \  __/\ \        /\ \      /'___\                                #
#\ \ \/\ \ \ \     __\ \ \____/\ \__/  ___   _ __   ___     __       #
# \ \ \ \ \ \ \  /'__`\ \ '__`\ \ ,__\/ __`\/\`'__\/'___\ /'__`\     #
#  \ \ \_/ \_\ \/\  __/\ \ \L\ \ \ \_/\ \L\ \ \ \//\ \__//\  __/     #
#   \ `\___x___/\ \____\\ \_,__/\ \_\\ \____/\ \_\\ \____\ \____\    #
#    '\/__//__/  \/____/ \/___/  \/_/ \/___/  \/_/ \/____/\/____/    #
#                                                                    #
#     )   ___                                                        #
#    (__/_____)                      Webforce Cart v.1.5             #
#      /       _   __ _/_            (c) 2004-2005 Webforce Ltd, NZ  #
#     /       (_(_/ (_(__            webforce.co.nz/cart             #
#    (______)                        all rights reserved             #
#                                                                    #
#  Session based, Object Oriented Shopping Cart Component for PHP    #
#                                                                    #
######################################################################
# Ver 1.6 - Bugfix // Thanks James
# Ver 1.5 - Demo updated, Licence changed to LGPL
# Ver 1.4 - demo included
# Ver 1.3 - bugfix with total
# Ver 1.2 - added empty_cart()
# Ver 1.0 - initial release
You are allowed to use this script in websites you create.
Licence: LGPL - http://www.gnu.org/copyleft/lesser.txt
*** Instructions at http://www.webforce.co.nz/cart/php-cart.php ***
*** READ THEM!                                                 ***

BUGS/PATCHES

Please email eaden@webforce.co.nz with any bugs/fixes/patches/comments etc.
See http://www.webforce.co.nz/cart/ for updates to this script

*/
class wfCart {
	var $total = 0;
	var $itemcount = 0;
	var $items = array();
        var $itemprices = array();
	var $itemqtys = array();
        var $iteminfo = array();

	function cart() {} // constructor function

	function get_contents()
	{ // gets cart contents
		$items = array();
		foreach($this->items as $tmp_item)
		{
		        $item = FALSE;

			$item['id'] = $tmp_item;
                        $item['qty'] = $this->itemqtys[$tmp_item];
			$item['price'] = $this->itemprices[$tmp_item];
			$item['info'] = $this->iteminfo[$tmp_item];
			$item['subtotal'] = $item['qty'] * $item['price'];
                        $items[] = $item;
		}
		return $items;
	} // end of get_contents


	function add_item($itemid,$qty=1,$price = FALSE, $info = FALSE)
	{ // adds an item to cart
                if(!$price)
		{
		        $price = wf_get_price($itemid,$qty);
		}

                if(!$info)
		{
                        $info = wf_get_info($itemid);
		}

		if($this->itemqtys[$itemid] > 0)
                { // the item is already in the cart..
		  // so we'll just increase the quantity
			$this->itemqtys[$itemid] = $qty + $this->itemqtys[$itemid];
			$this->_update_total();
		} else {
			$this->items[]=$itemid;
			$this->itemqtys[$itemid] = $qty;
			$this->itemprices[$itemid] = $price;
			$this->iteminfo[$itemid] = $info;
		}
		$this->_update_total();
	} // end of add_item


	function edit_item($itemid,$qty)
	{ // changes an items quantity

		if($qty < 1) {
			$this->del_item($itemid);
		} else {
			$this->itemqtys[$itemid] = $qty;
			// uncomment this line if using
			// the wf_get_price function
			// $this->itemprices[$itemid] = wf_get_price($itemid,$qty);
		}
		$this->_update_total();
	} // end of edit_item


	function del_item($itemid)
	{ // removes an item from cart
		$ti = array();
		$this->itemqtys[$itemid] = 0;
		foreach($this->items as $item)
		{
			if($item != $itemid)
			{
				$ti[] = $item;
			}
		}
		$this->items = $ti;
		$this->_update_total();
	} //end of del_item


        function empty_cart()
	{ // empties / resets the cart
                $this->total = 0;
	        $this->itemcount = 0;
	        $this->items = array();
                $this->itemprices = array();
	        $this->itemqtys = array();
                $this->iteminfo = array();
	} // end of empty cart


	function _update_total()
	{ // internal function to update the total in the cart
	        $this->itemcount = 0;
		$this->total = 0;
                if(sizeof($this->items > 0))
		{
                        foreach($this->items as $item) {
                                $this->total = $this->total + ($this->itemprices[$item] * $this->itemqtys[$item]);
				$this->itemcount++;
			}
		}
	} // end of update_total

}
?>
