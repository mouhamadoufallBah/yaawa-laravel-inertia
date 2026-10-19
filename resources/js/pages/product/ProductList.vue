<script setup>
import Header from "../../components/layouts/Header.vue";
import Footer from "@/components/layouts/Footer.vue";
import CategoryCard from "@/components/CategoryCard.vue";
import ProductCard from "@/components/ProductCard.vue";
import { computed, reactive, ref } from "vue";

const props = defineProps({
  products: Array,
  categories: Array,
});

const filter = reactive({
  search: null, //recherche par nom produit
  etat: "all", //tout les produit, disponible, en promotion
  order: "name-asc", //nom de A->z, prix croissant, prix decroissant
  categorie: null,
});

function onSelectCategory(id) {
  filter.categorie == id ? (filter.categorie = null) : (filter.categorie = id);
}

function onRenitialiseFilter() {
  filter.search = null;
  filter.categorie = null;
  filter.order = "name-asc";
  filter.etat = "all";
}

const productFiltered = computed(() => {
  let result = props.products ?? [];

  if (filter.categorie) {
    result = result.filter((one) => one.category_id === filter.categorie);
  }

  if (filter.search) {
    const search = filter.search.toLowerCase();
    result = result.filter((one) => one.name?.toLowerCase().includes(search));
  }

  if (filter.etat) {
    switch (filter.etat) {
      case "available":
        result = result.filter((one) => one.stock > 0);
        break;
      case "promo":
        result = result.filter((one) => one.sale_price != null);
        break;
      default:
        break;
    }
  }

  if (filter.order) {
    switch (filter.order) {
      case "price-asc":
        result = [...result].sort((a, b) => a.price - b.price);
        break;
      case "price-desc":
        result = [...result].sort((a, b) => b.price - a.price);
        break;
      case "name-asc":
        result = [...result].sort((a, b) =>
          (a.name ?? "").localeCompare(b.name ?? "")
        );
        break;
      default:
        break;
    }
  }

  return result;
});
</script>

<template>
  <Header />
  <main id="main-content" tabindex="-1">
    <div class="container page-space">
      <nav aria-label="Fil d’Ariane" class="breadcrumbs">
        <a href="index.html"> Accueil </a>
        <svg
          aria-hidden="true"
          class="icon"
          fill="none"
          height="12"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="1.7"
          viewbox="0 0 24 24"
          width="12"
        >
          <path d="m9 5 7 7-7 7"></path>
        </svg>
        <span aria-current="page"> Tout le marché </span>
      </nav>
      <header class="page-title">
        <div>
          <p class="overline">FAITES VOTRE MARCHÉ</p>
          <h1>Tout le marché</h1>
          <p class="muted">
            Les essentiels du quotidien, sélectionnés avec attention.
          </p>
        </div>
        <div class="page-actions"></div>
      </header>
      <div class="categories">
        <CategoryCard
          v-for="categorie in categories"
          :key="categorie.id"
          :category="categorie"
          @click="onSelectCategory(categorie.id)"
        />
      </div>
      <div class="mt"></div>
      <!-- DEMANDE 03 / 22 — À PROGRAMMER : Lier recherche, catégorie, disponibilité et tri ; calculer la liste filtrée et différer la recherche. -->
      <div class="filters" data-component="CatalogFilters">
        <label class="search-field">
          <svg
            aria-hidden="true"
            class="icon"
            fill="none"
            height="20"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="1.7"
            viewbox="0 0 24 24"
            width="20"
          >
            <path d="m21 21-5-5M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0"></path>
          </svg>
          <input
            aria-label="Rechercher un produit"
            name="search"
            placeholder="Du riz, des oignons, du bissap…"
            type="search"
            value=""
            v-model="filter.search"
          />
        </label>
        <select aria-label="Catégorie" name="categoryId">
          <option value="">Toutes les catégories</option>
          <option
            v-for="cat in categories"
            :key="cat.id"
            :value="cat.id"
            @click="onSelectCategory(cat.id)"
          >
            {{ cat.name }}
          </option>
        </select>
        <select
          aria-label="Disponibilité"
          name="availability"
          v-model="filter.etat"
        >
          <option value="all">Tous les produits</option>
          <option value="available">Disponibles</option>
          <option value="promo">En promotion</option>
        </select>
        <select
          aria-label="Trier les produits"
          name="sort"
          v-model="filter.order"
        >
          <option value="name-asc">Nom A → Z</option>
          <option value="price-asc">Prix croissant</option>
          <option value="price-desc">Prix décroissant</option>
        </select>
        <button
          class="text-button"
          data-action="reinitialiser-filtres"
          type="button"
          @click="onRenitialiseFilter"
        >
          Réinitialiser
        </button>
      </div>
      <div class="catalog-toolbar">
        <span class="muted small"> {{ productFiltered.length }} produits </span>
        <div class="view-switch">
          <a class="is-active" href="boutique.html">
            <svg
              aria-hidden="true"
              class="icon"
              fill="none"
              height="16"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.7"
              viewbox="0 0 24 24"
              width="16"
            >
              <path
                d="M3 3h7v7H3V3Zm11 0h7v7h-7V3ZM3 14h7v7H3v-7Zm11 0h7v7h-7v-7Z"
              ></path>
            </svg>
            Grille
          </a>
          <a href="boutique-liste.html">
            <svg
              aria-hidden="true"
              class="icon"
              fill="none"
              height="16"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.7"
              viewbox="0 0 24 24"
              width="16"
            >
              <path d="M8 5h13M8 12h13M8 19h13M3 5h.1M3 12h.1M3 19h.1"></path>
            </svg>
            Liste
          </a>
        </div>
      </div>
      <div class="product-grid">
        <ProductCard
          v-for="product in productFiltered"
          :key="product.id"
          :product="product"
        />
      </div>
      <p class="template-note">
        <svg
          aria-hidden="true"
          class="icon"
          fill="none"
          height="16"
          stroke="currentColor"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="1.7"
          viewbox="0 0 24 24"
          width="16"
        >
          <path d="m8 6-6 6 6 6m8-12 6 6-6 6M14 3l-4 18"></path>
        </svg>
        <span>
          Recherche, filtres et tri sont à programmer. Les liens Grille / Liste
          montrent deux variantes du même écran.
        </span>
      </p>
    </div>
  </main>
  <Footer />
</template>
<style scoped>
</style>