<?php
namespace Cart\Model\Table;

use Cake\Event\Event;
use Cake\ORM\Table;

class OrdersTable extends Table
{
    public function place($order)
    {
        if ($this->save($order)) {
            $this->Cart->remove($order);
            $event = new Event('Model.Order.afterPlace', $this, ['order' => $order]);
            $this->eventManager()->dispatch($event);
            return true;
        }
        return false;
    }
}
?>