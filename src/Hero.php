<?php

declare(strict_types=1);

namespace Dungeon;

/**
 * Le personnage joueur. Niveau 1, complété au chapitre Encapsulation puis aux niveaux 2, 3 et 4.
 * Fighter (niveau 4) : le contrat commun avec les monstres.
 *
 * Pas de getter ici : les propriétés se lisent directement ($hero->hp). Ce qui
 * empêche l'extérieur de les écrire, c'est `private(set)` (ou `readonly`).
 */
final class Hero implements Fighter
{
    /** Le maximum de points de vie. Lecture publique, écriture réservée à la classe. Niveau 1. */
     use HasHealth;



    /**
     * Propriété virtuelle (hook `get`, rien n'est stocké) : doit valoir true quand
     * hp est égal à maxHp. Chapitre Encapsulation.
     */
      

    /** Le sac, créé dans le constructeur : composition. Jamais remplacé, donc readonly. Niveau 2. */
    public readonly Inventory $inventory;




    /** L'arme équipée, ou null si le héros se bat à mains nues. Écrite par equip() seulement. Niveau 3. */
    public private(set) ?Weapon $weapon = null;

    /**
     * Doit initialiser maxHp et hp, et créer l'inventaire du héros (niveau 2).
     * Chapitre Encapsulation : doit d'abord refuser un nom vide
     * (InvalidArgumentException('Un héros a un nom.')) et un maxHp inférieur à 1
     * (InvalidArgumentException("maxHp doit valoir au moins 1, $maxHp reçu.")).
     */
  public function __construct(
        public readonly string $name,
        int $maxHp = 10,
        public readonly int $strength = 2,
    ) {
        if (trim($name) === '') {
            throw new \InvalidArgumentException('Un héros a un nom.');
        }

        if ($maxHp < 1) {
            throw new \InvalidArgumentException("maxHp doit valoir au moins 1, $maxHp reçu.");
        }

        $this->maxHp = $maxHp;
        $this->hp = $maxHp;
        $this->inventory = new Inventory();
    }
    /** Doit retirer $amount points de vie, sans jamais descendre sous 0. */
  

    /** Doit rendre $amount points de vie, sans jamais dépasser $maxHp. */
   

    /** Doit renvoyer true tant qu'il reste au moins 1 point de vie. */
   

    /** Doit équiper l'arme passée en paramètre (elle remplace la précédente). Niveau 3. */
    public function equip(Weapon $weapon): void
    {
        $this->weapon = $weapon;
    }

    /** Doit soigner le héros du montant de la potion, puis retirer la potion de l'inventaire. Niveau 3. */
    public function drink(Potion $potion): void
    {
        $this->heal($potion->healing);
        $this->inventory->remove($potion->name);
    }

    /** Doit renvoyer strength, plus les dégâts de l'arme équipée s'il y en a une. */
    public function attack(): int
    {
         return $this->strength + ($this->weapon?->damage ?? 0);
    }

    /** Doit renvoyer "Arthur (7/10 PV)". */
    public function __toString(): string
    {
        return sprintf('%s (%d/%d PV)', $this->name, $this->hp, $this->maxHp);
    }
}


$arthur = new Hero('Arthur');
$arthur->takeDamage(50);
echo $arthur, ' ', var_export($arthur->isFullHealth, true), PHP_EOL;
$arthur->heal(50);
echo $arthur, ' ', var_export($arthur->isFullHealth, true), PHP_EOL;

// $arthur = new Hero('Arthur');
// $arthur->inventory->add(new Item('Épée courte', 2.0));
// $arthur->inventory->add(new Item('Potion', 0.5));

// echo 'Enclume acceptée ? ', var_export($arthur->inventory->add(new Item('Enclume', 80.0)), true), "\n";
// echo $arthur->inventory->count(), ' objets, ', $arthur->inventory->totalWeight(), " kg\n";
