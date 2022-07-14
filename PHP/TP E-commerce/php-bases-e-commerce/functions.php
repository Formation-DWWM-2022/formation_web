<?php

function addToCart(array $product, int $quantity, array &$cart): void {
    // Si ma quantité est positive
    if($quantity > 0) {
        // Pour le moment je considère que mon produit n'est pas présent dans le panier
        $isInclude = false;

        // je parcours mes produits du panier
        foreach($cart as &$cartProduct) {
            // Si le produit que j'ajoute est présent dans le panier
            if($product['id'] === $cartProduct['product']['id']) {
                // J'augmente sa quantité
                $cartProduct['quantity'] += $quantity;
                // Je dis que j'ai trouvé le produit et qu'il est donc inclus.
                $isInclude = true;
            }
        }

        // Si je n'ai pas trouvé le produit dans mon panier
        if(!$isInclude) {
            // je l'ajoute au panier
            $cart[] = [
                'product' => $product,
                'quantity' => $quantity,
            ];
        }
    }
}


function addToCartAlter(array $product, int $quantity, array &$cart): void {
    // Si ma quantité est positive
    if($quantity > 0) {
        // Pour le moment je considère que mon produit n'est pas présent dans le panier
        $isInclude = false;

        // Si mon produit est présent dans le panier
        if(isset($cart[$product['id']])) {
            // J'augmente sa quantité
            $cart[$product['id']]['quantity'] += $quantity;
            // Je dis que j'ai trouvé le produit et qu'il est donc inclus.
            $isInclude = true;
        }

        // Si je n'ai pas trouvé le produit dans mon panier
        if(!$isInclude) {
            // je l'ajoute au panier
            $cart[$product['id']] = [
                'product' => $product,
                'quantity' => $quantity,
            ];
        }
    }
}