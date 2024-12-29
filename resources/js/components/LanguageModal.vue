<template>
    <div class="language-translation-modal">
        <div class="search-box">
            <i class="bi bi-search"></i>
            <input type="text" placeholder="Search Language" v-model="searchText"/>
        </div>

        <div class="language-list row">
            <div
                class="col-md-6"
                v-for="(each, index) in filtered"
                :key="index"
                @click="$emit('selectLanguage', type, each)"
            >
                <div
                    :class="`language ${
                        selectedLanguage && selectedLanguage.id == each.id
                            ? 'selected'
                            : ''
                    }`"
                >
                    <i
                        class="bi bi-check-lg"
                        v-if="
                            selectedLanguage && selectedLanguage.id == each.id
                        "
                    ></i>
                    {{ each.name }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "LanguageModal",
    props: ["languages", "type", "selectedLanguage"],
    data() {
        return {
            searchText: "",
        };
    },
    computed: {
        filtered() {
            // If no search term, return all items
            if (!this.searchText) {
                return this.languages;
            }
            return this.languages.filter((item) =>
                item.name.toLowerCase().includes(this.searchText.toLowerCase())
            );
        },
    },
};
</script>

<style></style>
