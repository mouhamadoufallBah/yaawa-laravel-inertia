<script setup>
import { Head } from "@inertiajs/vue3";
import Header from "../../components/layouts/Header.vue";
import Footer from "@/components/layouts/Footer.vue";
import CategoryCard from "@/components/CategoryCard.vue";
import ProductCard from "@/components/ProductCard.vue";

const props = defineProps({
  products: Array,
  categories: Array,
});
</script>

<template>

    <Header/>
     <main id="main-content" tabindex="-1">
   <div class="container page-space">
    <nav aria-label="Fil d’Ariane" class="breadcrumbs">
     <a href="index.html">
      Accueil
     </a>
     <svg aria-hidden="true" class="icon" fill="none" height="12" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="12">
      <path d="m9 5 7 7-7 7">
      </path>
     </svg>
     <span aria-current="page">
      Tout le marché
     </span>
    </nav>
    <header class="page-title">
     <div>
      <p class="overline">
       FAITES VOTRE MARCHÉ
      </p>
      <h1>
       Tout le marché
      </h1>
      <p class="muted">
       Les essentiels du quotidien, sélectionnés avec attention.
      </p>
     </div>
     <div class="page-actions">
     </div>
    </header>
    <!-- DEMANDE 01 / 03 — À PROGRAMMER : Utiliser les catégories de l’API pour les images, la couleur CSS et le filtre. -->
    <div class="categories">
     <a class="category" href="categories/cereales.html" style="--category-color: #b98a38">
      <img alt="" height="48" src="assets/images/cereales.svg" width="56"/>
      <span>
       Céréales
      </span>
     </a>
     <a class="category" href="categories/legumes.html" style="--category-color: #468060">
      <img alt="" height="48" src="assets/images/legumes.svg" width="56"/>
      <span>
       Légumes
      </span>
     </a>
     <a class="category" href="categories/epicerie.html" style="--category-color: #b65c3a">
      <img alt="" height="48" src="assets/images/epicerie.svg" width="56"/>
      <span>
       Épicerie
      </span>
     </a>
     <a class="category" href="categories/poisson.html" style="--category-color: #477d87">
      <img alt="" height="48" src="assets/images/poisson.svg" width="56"/>
      <span>
       Poisson
      </span>
     </a>
     <a class="category" href="categories/saveurs-locales.html" style="--category-color: #956687">
      <img alt="" height="48" src="assets/images/local.svg" width="56"/>
      <span>
       Saveurs locales
      </span>
     </a>
    </div>
    <div class="mt">
    </div>
    <!-- DEMANDE 03 / 22 — À PROGRAMMER : Lier recherche, catégorie, disponibilité et tri ; calculer la liste filtrée et différer la recherche. -->
    <div class="filters" data-component="CatalogFilters">
     <label class="search-field">
      <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
       <path d="m21 21-5-5M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0">
       </path>
      </svg>
      <input aria-label="Rechercher un produit" name="search" placeholder="Du riz, des oignons, du bissap…" type="search" value=""/>
     </label>
     <select aria-label="Catégorie" name="categoryId">
      <option value="">
       Toutes les catégories
      </option>
      <option value="1">
       Céréales
      </option>
      <option value="2">
       Légumes
      </option>
      <option value="3">
       Épicerie
      </option>
      <option value="4">
       Poisson
      </option>
      <option value="5">
       Saveurs locales
      </option>
     </select>
     <select aria-label="Disponibilité" name="availability">
      <option value="all">
       Tous les produits
      </option>
      <option value="available">
       Disponibles
      </option>
      <option value="promo">
       En promotion
      </option>
     </select>
     <select aria-label="Trier les produits" name="sort">
      <option value="name">
       Nom A → Z
      </option>
      <option value="price-asc">
       Prix croissant
      </option>
      <option value="price-desc">
       Prix décroissant
      </option>
     </select>
     <button class="text-button" data-action="reinitialiser-filtres" type="button">
      Réinitialiser
     </button>
    </div>
    <div class="catalog-toolbar">
     <span class="muted small">
      19 produits
     </span>
     <div class="view-switch">
      <a class="is-active" href="boutique.html">
       <svg aria-hidden="true" class="icon" fill="none" height="16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="16">
        <path d="M3 3h7v7H3V3Zm11 0h7v7h-7V3ZM3 14h7v7H3v-7Zm11 0h7v7h-7v-7Z">
        </path>
       </svg>
       Grille
      </a>
      <a href="boutique-liste.html">
       <svg aria-hidden="true" class="icon" fill="none" height="16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="16">
        <path d="M8 5h13M8 12h13M8 19h13M3 5h.1M3 12h.1M3 19h.1">
        </path>
       </svg>
       Liste
      </a>
     </div>
    </div>
    <div class="product-grid">
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="1">
      <div class="product-media">
       <a aria-label="Voir Riz brisé parfumé" href="produits/01-riz.html">
        <img alt="Riz brisé parfumé" height="240" loading="lazy" src="assets/images/riz.svg" width="360"/>
       </a>
      </div>
      <div class="product-body">
       <p class="overline">
        Vallée du fleuve
       </p>
       <h3>
        <a href="produits/01-riz.html">
         Riz brisé parfumé
        </a>
       </h3>
       <p class="muted small">
        sac de 25 kg · 18 disponible(s)
       </p>
       <span class="stock">
        <span aria-hidden="true">
        </span>
        Disponible
       </span>
       <div class="product-bottom">
        <div>
         <strong>
          17 500 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Riz brisé parfumé au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="2">
      <div class="product-media">
       <a aria-label="Voir Oignons de Potou" href="produits/02-oignons.html">
        <img alt="Oignons de Potou" height="240" loading="lazy" src="assets/images/oignons.svg" width="360"/>
       </a>
       <span class="promo-tag">
        Promo −7 %
       </span>
      </div>
      <div class="product-body">
       <p class="overline">
        Potou
       </p>
       <h3>
        <a href="produits/02-oignons.html">
         Oignons de Potou
        </a>
       </h3>
       <p class="muted small">
        kg · 4 disponible(s)
       </p>
       <span class="stock low">
        <span aria-hidden="true">
        </span>
        Stock faible
       </span>
       <div class="product-bottom">
        <div>
         <del>
          750 FCFA
         </del>
         <strong>
          700 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Oignons de Potou au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="3">
      <div class="product-media">
       <a aria-label="Voir Mil local" href="produits/03-mil.html">
        <img alt="Mil local" height="240" loading="lazy" src="assets/images/mil.svg" width="360"/>
       </a>
      </div>
      <div class="product-body">
       <p class="overline">
        Kaolack
       </p>
       <h3>
        <a href="produits/03-mil.html">
         Mil local
        </a>
       </h3>
       <p class="muted small">
        kg · 24 disponible(s)
       </p>
       <span class="stock">
        <span aria-hidden="true">
        </span>
        Disponible
       </span>
       <div class="product-bottom">
        <div>
         <strong>
          800 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Mil local au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="4">
      <div class="product-media">
       <a aria-label="Voir Fonio précuit" href="produits/04-fonio.html">
        <img alt="Fonio précuit" height="240" loading="lazy" src="assets/images/fonio.svg" width="360"/>
       </a>
       <span class="promo-tag">
        Promo −9 %
       </span>
      </div>
      <div class="product-body">
       <p class="overline">
        Kédougou
       </p>
       <h3>
        <a href="produits/04-fonio.html">
         Fonio précuit
        </a>
       </h3>
       <p class="muted small">
        sachet de 500 g · 12 disponible(s)
       </p>
       <span class="stock">
        <span aria-hidden="true">
        </span>
        Disponible
       </span>
       <div class="product-bottom">
        <div>
         <del>
          2 200 FCFA
         </del>
         <strong>
          2 000 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Fonio précuit au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="5">
      <div class="product-media">
       <a aria-label="Voir Maïs en grains" href="produits/05-mais.html">
        <img alt="Maïs en grains" height="240" loading="lazy" src="assets/images/mais.svg" width="360"/>
       </a>
      </div>
      <div class="product-body">
       <p class="overline">
        Tambacounda
       </p>
       <h3>
        <a href="produits/05-mais.html">
         Maïs en grains
        </a>
       </h3>
       <p class="muted small">
        kg · 30 disponible(s)
       </p>
       <span class="stock">
        <span aria-hidden="true">
        </span>
        Disponible
       </span>
       <div class="product-bottom">
        <div>
         <strong>
          650 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Maïs en grains au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="6">
      <div class="product-media">
       <a aria-label="Voir Tomates fraîches" href="produits/06-tomates.html">
        <img alt="Tomates fraîches" height="240" loading="lazy" src="assets/images/tomates.svg" width="360"/>
       </a>
      </div>
      <div class="product-body">
       <p class="overline">
        Niayes
       </p>
       <h3>
        <a href="produits/06-tomates.html">
         Tomates fraîches
        </a>
       </h3>
       <p class="muted small">
        kg · 16 disponible(s)
       </p>
       <span class="stock">
        <span aria-hidden="true">
        </span>
        Disponible
       </span>
       <div class="product-bottom">
        <div>
         <strong>
          1 000 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Tomates fraîches au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="7">
      <div class="product-media">
       <a aria-label="Voir Carottes" href="produits/07-carottes.html">
        <img alt="Carottes" height="240" loading="lazy" src="assets/images/carottes.svg" width="360"/>
       </a>
      </div>
      <div class="product-body">
       <p class="overline">
        Niayes
       </p>
       <h3>
        <a href="produits/07-carottes.html">
         Carottes
        </a>
       </h3>
       <p class="muted small">
        kg · 7 disponible(s)
       </p>
       <span class="stock">
        <span aria-hidden="true">
        </span>
        Disponible
       </span>
       <div class="product-bottom">
        <div>
         <strong>
          900 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Carottes au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card out-of-stock" data-component="ProductCard" data-product-id="8">
      <div class="product-media">
       <a aria-label="Voir Gombo frais" href="produits/08-gombo.html">
        <img alt="Gombo frais" height="240" loading="lazy" src="assets/images/gombo.svg" width="360"/>
       </a>
      </div>
      <div class="product-body">
       <p class="overline">
        Thiès
       </p>
       <h3>
        <a href="produits/08-gombo.html">
         Gombo frais
        </a>
       </h3>
       <p class="muted small">
        kg · 0 disponible(s)
       </p>
       <span class="stock empty">
        <span aria-hidden="true">
        </span>
        Rupture de stock
       </span>
       <div class="product-bottom">
        <div>
         <strong>
          1 200 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Gombo frais au panier" class="add-button" data-action="ajouter-panier" disabled="" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="9">
      <div class="product-media">
       <a aria-label="Voir Huile d’arachide" href="produits/09-huile.html">
        <img alt="Huile d’arachide" height="240" loading="lazy" src="assets/images/huile.svg" width="360"/>
       </a>
       <span class="promo-tag">
        Promo −7 %
       </span>
      </div>
      <div class="product-body">
       <p class="overline">
        Kaolack
       </p>
       <h3>
        <a href="produits/09-huile.html">
         Huile d’arachide
        </a>
       </h3>
       <p class="muted small">
        bouteille de 2 L · 20 disponible(s)
       </p>
       <span class="stock">
        <span aria-hidden="true">
        </span>
        Disponible
       </span>
       <div class="product-bottom">
        <div>
         <del>
          4 500 FCFA
         </del>
         <strong>
          4 200 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Huile d’arachide au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="10">
      <div class="product-media">
       <a aria-label="Voir Sucre en poudre" href="produits/10-sucre.html">
        <img alt="Sucre en poudre" height="240" loading="lazy" src="assets/images/sucre.svg" width="360"/>
       </a>
      </div>
      <div class="product-body">
       <p class="overline">
        Démonstration
       </p>
       <h3>
        <a href="produits/10-sucre.html">
         Sucre en poudre
        </a>
       </h3>
       <p class="muted small">
        kg · 32 disponible(s)
       </p>
       <span class="stock">
        <span aria-hidden="true">
        </span>
        Disponible
       </span>
       <div class="product-bottom">
        <div>
         <strong>
          650 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Sucre en poudre au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="11">
      <div class="product-media">
       <a aria-label="Voir Sel iodé" href="produits/11-sel.html">
        <img alt="Sel iodé" height="240" loading="lazy" src="assets/images/sel.svg" width="360"/>
       </a>
      </div>
      <div class="product-body">
       <p class="overline">
        Démonstration
       </p>
       <h3>
        <a href="produits/11-sel.html">
         Sel iodé
        </a>
       </h3>
       <p class="muted small">
        sachet de 500 g · 45 disponible(s)
       </p>
       <span class="stock">
        <span aria-hidden="true">
        </span>
        Disponible
       </span>
       <div class="product-bottom">
        <div>
         <strong>
          300 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Sel iodé au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="12">
      <div class="product-media">
       <a aria-label="Voir Pâte d’arachide" href="produits/12-pate-arachide.html">
        <img alt="Pâte d’arachide" height="240" loading="lazy" src="assets/images/pate.svg" width="360"/>
       </a>
      </div>
      <div class="product-body">
       <p class="overline">
        Kaolack
       </p>
       <h3>
        <a href="produits/12-pate-arachide.html">
         Pâte d’arachide
        </a>
       </h3>
       <p class="muted small">
        pot de 500 g · 5 disponible(s)
       </p>
       <span class="stock low">
        <span aria-hidden="true">
        </span>
        Stock faible
       </span>
       <div class="product-bottom">
        <div>
         <strong>
          1 500 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Pâte d’arachide au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="13">
      <div class="product-media">
       <a aria-label="Voir Thiof" href="produits/13-thiof.html">
        <img alt="Thiof" height="240" loading="lazy" src="assets/images/thiof.svg" width="360"/>
       </a>
      </div>
      <div class="product-body">
       <p class="overline">
        Joal
       </p>
       <h3>
        <a href="produits/13-thiof.html">
         Thiof
        </a>
       </h3>
       <p class="muted small">
        kg · 8 disponible(s)
       </p>
       <span class="stock">
        <span aria-hidden="true">
        </span>
        Disponible
       </span>
       <div class="product-bottom">
        <div>
         <strong>
          4 500 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Thiof au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="14">
      <div class="product-media">
       <a aria-label="Voir Sardinelles" href="produits/14-sardinelles.html">
        <img alt="Sardinelles" height="240" loading="lazy" src="assets/images/sardinelles.svg" width="360"/>
       </a>
       <span class="promo-tag">
        Promo −17 %
       </span>
      </div>
      <div class="product-body">
       <p class="overline">
        Kayar
       </p>
       <h3>
        <a href="produits/14-sardinelles.html">
         Sardinelles
        </a>
       </h3>
       <p class="muted small">
        kg · 25 disponible(s)
       </p>
       <span class="stock">
        <span aria-hidden="true">
        </span>
        Disponible
       </span>
       <div class="product-bottom">
        <div>
         <del>
          1 200 FCFA
         </del>
         <strong>
          1 000 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Sardinelles au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card out-of-stock" data-component="ProductCard" data-product-id="15">
      <div class="product-media">
       <a aria-label="Voir Crevettes" href="produits/15-crevettes.html">
        <img alt="Crevettes" height="240" loading="lazy" src="assets/images/crevettes.svg" width="360"/>
       </a>
      </div>
      <div class="product-body">
       <p class="overline">
        Casamance
       </p>
       <h3>
        <a href="produits/15-crevettes.html">
         Crevettes
        </a>
       </h3>
       <p class="muted small">
        kg · 0 disponible(s)
       </p>
       <span class="stock empty">
        <span aria-hidden="true">
        </span>
        Rupture de stock
       </span>
       <div class="product-bottom">
        <div>
         <strong>
          6 500 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Crevettes au panier" class="add-button" data-action="ajouter-panier" disabled="" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="16">
      <div class="product-media">
       <a aria-label="Voir Poisson fumé" href="produits/16-poisson-fume.html">
        <img alt="Poisson fumé" height="240" loading="lazy" src="assets/images/fume.svg" width="360"/>
       </a>
      </div>
      <div class="product-body">
       <p class="overline">
        Saint-Louis
       </p>
       <h3>
        <a href="produits/16-poisson-fume.html">
         Poisson fumé
        </a>
       </h3>
       <p class="muted small">
        sachet de 500 g · 6 disponible(s)
       </p>
       <span class="stock">
        <span aria-hidden="true">
        </span>
        Disponible
       </span>
       <div class="product-bottom">
        <div>
         <strong>
          3 000 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Poisson fumé au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="17">
      <div class="product-media">
       <a aria-label="Voir Bissap séché" href="produits/17-bissap.html">
        <img alt="Bissap séché" height="240" loading="lazy" src="assets/images/bissap.svg" width="360"/>
       </a>
      </div>
      <div class="product-body">
       <p class="overline">
        Kaolack
       </p>
       <h3>
        <a href="produits/17-bissap.html">
         Bissap séché
        </a>
       </h3>
       <p class="muted small">
        sachet de 250 g · 22 disponible(s)
       </p>
       <span class="stock">
        <span aria-hidden="true">
        </span>
        Disponible
       </span>
       <div class="product-bottom">
        <div>
         <strong>
          1 200 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Bissap séché au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="18">
      <div class="product-media">
       <a aria-label="Voir Bouye en poudre" href="produits/18-bouye.html">
        <img alt="Bouye en poudre" height="240" loading="lazy" src="assets/images/bouye.svg" width="360"/>
       </a>
       <span class="promo-tag">
        Promo −11 %
       </span>
      </div>
      <div class="product-body">
       <p class="overline">
        Tambacounda
       </p>
       <h3>
        <a href="produits/18-bouye.html">
         Bouye en poudre
        </a>
       </h3>
       <p class="muted small">
        sachet de 500 g · 13 disponible(s)
       </p>
       <span class="stock">
        <span aria-hidden="true">
        </span>
        Disponible
       </span>
       <div class="product-bottom">
        <div>
         <del>
          1 800 FCFA
         </del>
         <strong>
          1 600 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Bouye en poudre au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
     <!-- DEMANDE 02 / 05 — À PROGRAMMER : Transformer cette carte en ProductCard, déclarer les props et émettre add. Répéter les cartes depuis les données. -->
     <article class="product-card" data-component="ProductCard" data-product-id="19">
      <div class="product-media">
       <a aria-label="Voir Café Touba" href="produits/19-cafe-touba.html">
        <img alt="Café Touba" height="240" loading="lazy" src="assets/images/cafe.svg" width="360"/>
       </a>
      </div>
      <div class="product-body">
       <p class="overline">
        Démonstration
       </p>
       <h3>
        <a href="produits/19-cafe-touba.html">
         Café Touba
        </a>
       </h3>
       <p class="muted small">
        sachet de 500 g · 18 disponible(s)
       </p>
       <span class="stock">
        <span aria-hidden="true">
        </span>
        Disponible
       </span>
       <div class="product-bottom">
        <div>
         <strong>
          2 500 FCFA
         </strong>
        </div>
        <button aria-label="Ajouter Café Touba au panier" class="add-button" data-action="ajouter-panier" type="button">
         <svg aria-hidden="true" class="icon" fill="none" height="20" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="20">
          <path d="M12 5v14M5 12h14">
          </path>
         </svg>
        </button>
       </div>
      </div>
     </article>
    </div>
    <p class="template-note">
     <svg aria-hidden="true" class="icon" fill="none" height="16" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" viewbox="0 0 24 24" width="16">
      <path d="m8 6-6 6 6 6m8-12 6 6-6 6M14 3l-4 18">
      </path>
     </svg>
     <span>
      Recherche, filtres et tri sont à programmer. Les liens Grille / Liste montrent deux variantes du même écran.
     </span>
    </p>
   </div>
  </main>
    <Footer/>
</template>
<style scoped>
</style>