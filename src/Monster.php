<?php

declare(strict_types=1);

namespace Dungeon;

/**
 * Un monstre du donjon. Classe ABSTRAITE : on ne croise jamais "un monstre",
 * on croise un gobelin ou un dragon. Niveau 3, devient Fighter au niveau 4.
 */
abstract class Monster implements Fighter
{
    use HasHealth;
    /** Le maximum de points de vie. Lecture publique, écriture réservée à la classe. */
   

    /** Propriété virtuelle : doit valoir true quand hp est égal à maxHp. */
   

    /** Doit garder le nom et initialiser maxHp puis hp à $maxHp. */
    public function __construct(
        public readonly string $name,
        int $maxHp,
    ) {
        $this->maxHp = $maxHp;
        $this->hp = $maxHp;
    }

    /** Doit retirer $amount points de vie, sans jamais descendre sous 0. */
   

    /** Doit rendre $amount points de vie, sans jamais dépasser $maxHp. */
   

    /** Doit renvoyer true tant qu'il reste au moins 1 point de vie. */
   

    /** Chaque monstre frappe à sa façon : c'est aux sous-classes de l'écrire. */
    abstract public function attack(): int;

    /** Doit renvoyer "Gobelin (5/5 PV)". */
    public function __toString(): string
    {
        return "{$this->name} ({$this->hp}/{$this->maxHp} PV)";
    }
}
