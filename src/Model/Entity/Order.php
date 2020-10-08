<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property string|null $orderid
 * @property int|null $buy_intake_control_id
 * @property \Cake\I18n\FrozenTime|null $order_date
 * @property int|null $order_channel_id
 * @property string|null $channel_name
 * @property string|null $channel_orderid
 * @property \Cake\I18n\FrozenTime|null $paid_date
 * @property \Cake\I18n\FrozenTime|null $shipped_date
 * @property \Cake\I18n\FrozenTime|null $canceled_date
 * @property string|null $currency
 * @property int|null $order_shipping_method_id
 * @property int|null $lineitem_number
 * @property string|null $lineitem_sku
 * @property string|null $lineitem_name
 * @property int|null $lineitem_quantity
 * @property int|null $lineitem_fulfilled
 * @property float|null $lineitem_price
 * @property float|null $lineitem_subtotal
 * @property string|null $billing_name
 * @property string|null $billing_address_1
 * @property string|null $billing_address_2
 * @property string|null $billing_address_3
 * @property string|null $billing_company
 * @property string|null $billing_city
 * @property string|null $billing_zip
 * @property string|null $billing_state_province
 * @property string|null $billing_country
 * @property string|null $billing_phone
 * @property string|null $billing_email
 * @property string|null $shipping_name
 * @property string|null $shipping_address_1
 * @property string|null $shipping_address_2
 * @property string|null $shipping_address_3
 * @property string|null $shipping_company
 * @property string|null $shipping_city
 * @property string|null $shipping_zip
 * @property string|null $shipping_state_province
 * @property string|null $shipping_country
 * @property string|null $shipping_phone
 * @property string|null $shipping_email
 * @property string|null $notes
 * @property float|null $sub_total
 * @property float|null $shipping
 * @property float|null $tax
 * @property float|null $discount
 * @property float|null $total
 * @property int|null $order_status_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\BuyIntakeControl $buy_intake_control
 * @property \App\Model\Entity\OrderChannel $order_channel
 * @property \App\Model\Entity\OrderShippingMethod $order_shipping_method
 * @property \App\Model\Entity\OrderStatus $order_status
 */
class Order extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'orderid' => true,
        'buy_intake_control_id' => true,
        'order_date' => true,
        'order_channel_id' => true,
        'channel_name' => true,
        'channel_orderid' => true,
        'paid_date' => true,
        'shipped_date' => true,
        'canceled_date' => true,
        'currency' => true,
        'order_shipping_method_id' => true,
        'lineitem_number' => true,
        'lineitem_sku' => true,
        'lineitem_name' => true,
        'lineitem_quantity' => true,
        'lineitem_fulfilled' => true,
        'lineitem_price' => true,
        'lineitem_subtotal' => true,
        'billing_name' => true,
        'billing_address_1' => true,
        'billing_address_2' => true,
        'billing_address_3' => true,
        'billing_company' => true,
        'billing_city' => true,
        'billing_zip' => true,
        'billing_state_province' => true,
        'billing_country' => true,
        'billing_phone' => true,
        'billing_email' => true,
        'shipping_name' => true,
        'shipping_address_1' => true,
        'shipping_address_2' => true,
        'shipping_address_3' => true,
        'shipping_company' => true,
        'shipping_city' => true,
        'shipping_zip' => true,
        'shipping_state_province' => true,
        'shipping_country' => true,
        'shipping_phone' => true,
        'shipping_email' => true,
        'notes' => true,
        'sub_total' => true,
        'shipping' => true,
        'tax' => true,
        'discount' => true,
        'total' => true,
        'order_status_id' => true,
        'created' => true,
        'modified' => true,
        'buy_intake_control' => true,
        'order_channel' => true,
        'order_shipping_method' => true,
        'order_status' => true,
    ];
}
