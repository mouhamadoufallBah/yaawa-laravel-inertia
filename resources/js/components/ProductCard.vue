<script setup>
import { Link } from '@inertiajs/vue3';
defineProps({
    product: Object
})
</script>
<template>
  <article
           
            class="product-card"
            data-component="ProductCard"
            data-product-id="1"
          >
            <div class="product-media">
              <Link :href="`/product/${product.id}`"
              >
                <img
                  alt="Riz brisé parfumé"
                  height="240"
                  loading="lazy"
                  :src="`/assets/${product.image}`"
                  width="360"
                />
              </Link>
              <span class="promo-tag" v-if="product.sale_price">
                Promo −{{
                  (
                    ((product.price - product.sale_price) / product.price) *
                    100
                  ).toFixed(0)
                }}
                %
              </span>
            </div>
            <div class="product-body">
              <p class="overline">{{ product.origin }}</p>
              <h3>
                <a href="produits/01-riz.html"> {{ product.name }} </a>
              </h3>
              <p class="muted small">
                {{ product.unit }} · {{ product.stock }} disponible(s)
              </p>
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
              <div class="product-bottom">
                <div>
                  <div>
                    <del v-if="product.sale_price">{{ product.price }} FCFA</del>
                    <de>
                      {{
                        product.sale_price ? product.sale_price : product.price
                      }}
                      FCFA
                    </de>
                  </div>
                </div>
                <button
                  aria-label="Ajouter Riz brisé parfumé au panier"
                  class="add-button"
                  data-action="ajouter-panier"
                  type="button"
                  :disabled="product.stock < 1"
                >
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
                    <path d="M12 5v14M5 12h14"></path>
                  </svg>
                </button>
              </div>
            </div>
          </article>
</template>

<style>

</style>