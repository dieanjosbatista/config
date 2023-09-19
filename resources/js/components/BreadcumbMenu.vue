<template>

    <!-- Cabeçalho da página / Menu Breadcumb -->
    <div class="page-header mt-0 mb-3 d-print-none" v-if="items.length">
        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" v-for="(item, i) in items">
                    <Link :href="item.url" class="mx-2"
                        :style="i === items.length - 1 ? 'font-weight: bold !important; color: #206bc4;' : ''">
                    {{ item.name }}
                    </Link>
                </li>
            </ol>
        </nav>
    </div>
</template>

<script>
import { Link } from '@inertiajs/vue3'

export default {
    name: 'BreadcumbMenu',
    props: { items: Array },
    components: { Link }
}

</script>
