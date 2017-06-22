<?php

namespace Pho\Kernel\Bridge;

use Pho\Lib\Graph;
use Pho\Lib\Graph\ID;
use Pho\Framework;

/**
 * Compat layer between the kernel and lower level packages
 * 
 * This trait is a compatibility layer between the kernel and 
 * lower level packages, namely pho-lib-graph and pho-framework.
 * Both of these packages provide hydration functions useful to
 * implement persistence at higher levels. This trait is 
 * responsible of implementing these hydration/persistence methods
 * for the kernel.
 * 
 * @author Emre Sokullu <emre@phonetworks.org>
 */
trait GraphHydratorTrait {

    protected function onAdd(Graph\NodeInterface $node): void
    {
        $this->persist();
    }

    protected function onRemove(ID $node_id): void
    {
        $this->persist();
    }

    // clustertrait
    protected function hydratedGet(ID $node_id): Graph\NodeInterface
    {
        return $this->kernel->utils()->node($node_id);
    }

    // clustertrait
    // not caching on purpose. 
    // [?] it is now.
    protected function hydratedMembers(): array
    {
        foreach($this->node_ids as $node_id) {
            $this->nodes[$node_id] = $this->kernel->gs()->node($node_id);
        }
        return $this->nodes;
    }

}