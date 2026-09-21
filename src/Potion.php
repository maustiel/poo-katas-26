<?php

declare(strict_types=1);

namespace Dungeon;

/** Une potion : un objet qui rend des points de vie. Niveau 3. */
final class Potion extends Item
{
    public function __construct(
        string $name, 
        float $weight, 
        public readonly int $healing)
    {
        parent::__construct($name, $weight);
    }

    public function describe(): string
    {
        return sprintf('%s : potion (%s kg, +%d PV)', $this->name, $this->weight, $this->healing);
    }
}

echo (new Weapon('Épée courte', 2.0, 5))->describe(), PHP_EOL;
echo (new Potion('Potion de soin', 0.5, 5))->describe(), PHP_EOL;

