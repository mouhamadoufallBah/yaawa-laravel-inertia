<script setup>
import Footer from "@/components/layouts/Footer.vue";
import Header from "@/components/layouts/Header.vue";
import ProductCard from "@/components/ProductCard.vue";
import { Link } from "@inertiajs/vue3";
const props = defineProps({
  product: Object,
  similarProduct: Array,
});
</script>

<template>
  <Header />
  <main id="main-content" tabindex="-1">
    <div class="container page-space">
      <nav aria-label="Fil d’Ariane" class="breadcrumbs">
        <a href="../index.html"> Accueil </a>
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
        <a href="../boutique.html"> Boutique </a>
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
        <span aria-current="page"> {{ props.product.name }} </span>
      </nav>
      <!-- DEMANDE 04 — À PROGRAMMER : Lire l’identifiant de route, appeler l’API et gérer les changements d’identifiant, le chargement et les erreurs. -->
      <section class="product-detail" data-component="ProductDetail">
        <div class="detail-image">
          <img
            :alt="props.product.name"
            height="520"
            :src="`/assets/${props.product.image}`"
            width="600"
          />
        </div>
        <div class="detail-copy">
          <p class="overline">
            {{ props.product.category.name }} · {{ props.product.origin }}
          </p>
          <h1>{{ props.product.name }}</h1>
          <p class="muted">{{ props.product.unit }}</p>
          <span
            :class="
              product.stock < 1
                ? 'stock empty'
                : product.stock <= 5
                ? 'stock low'
                : 'stock'
            "
          >
            <span aria-hidden="true"> </span>
            Disponible
          </span>
          <p class="description">
            {{ props.product.description }}
          </p>
          <div class="detail-price">
            <del v-if="product.sale_price">{{ product.price }} FCFA</del>

            <strong>
              {{ product.sale_price ? product.sale_price : product.price }} FCFA
            </strong>
          </div>
          <div class="detail-buy">
            <div class="quantity" data-component="QuantityControl">
              <button
                aria-label="Diminuer la quantité de Riz brisé parfumé"
                class=""
                data-action="diminuer-quantite"
                type="button"
              >
                −
              </button>
              <input
                aria-label="Quantité de Riz brisé parfumé"
                id="detail-1"
                max="18"
                min="0"
                name="quantity"
                step="1"
                type="number"
                value="1"
              />
              <button
                aria-label="Augmenter la quantité de Riz brisé parfumé"
                class=""
                data-action="augmenter-quantite"
                type="button"
              >
                +
              </button>
            </div>
            <button class="btn" data-action="ajouter-panier" type="button">
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
                <path d="M6 7h12l2 14H4L6 7Zm3 0V5a3 3 0 0 1 6 0v2"></path>
              </svg>
              Ajouter au panier
            </button>
          </div>
          <p class="small muted">
            {{ props.product.stock }} unité(s) disponible(s). La quantité sera
            vérifiée avant confirmation.
          </p>
          <div class="detail-facts">
            <span>
              <svg
                aria-hidden="true"
                class="icon"
                fill="none"
                height="18"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.7"
                viewbox="0 0 24 24"
                width="18"
              >
                <path
                  d="M20 10c0 6-8 12-8 12S4 16 4 10a8 8 0 1 1 16 0Zm-5 0a3 3 0 1 1-6 0 3 3 0 0 1 6 0"
                ></path>
              </svg>
              Retrait à Castors
            </span>
            <span>
              <svg
                aria-hidden="true"
                class="icon"
                fill="none"
                height="18"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.7"
                viewbox="0 0 24 24"
                width="18"
              >
                <path
                  d="M2 5h12v12H2V5Zm12 5h4l4 4v3h-8M8 18a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm12 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0"
                ></path>
              </svg>
              Livraison par quartier
            </span>
            <span>
              <svg
                aria-hidden="true"
                class="icon"
                fill="none"
                height="18"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.7"
                viewbox="0 0 24 24"
                width="18"
              >
                <path d="m5 12 4 4L19 6"></path>
              </svg>
              Paiement à la remise
            </span>
          </div>
          <p class="small muted mt">
            Prix et provenance fictifs pour l’exercice.
          </p>
        </div>
      </section>
      <section class="mt">
        <div class="section-heading">
          <div>
            <p class="overline">DANS LE MÊME RAYON</p>
            <h2>Pour compléter votre marché</h2>
          </div>
          <Link class="text-button" href="/market">
            Revenir à la boutique
          </Link>
        </div>
        <div class="product-grid">
          <ProductCard
            v-for="product in similarProduct"
            :key="product.id"
            :product="product"
          />
        </div>
      </section>

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
          width="32"
        >
          <path d="m8 6-6 6 6 6m8-12 6 6-6 6M14 3l-4 18"></path>
        </svg>
        <span>
          Les données sont des exemples fixes. Les actions métier seront
          programmées par les étudiants.
        </span>
      </p>
    </div>
  </main>
  <Footer />
</template>

<style>
</style>