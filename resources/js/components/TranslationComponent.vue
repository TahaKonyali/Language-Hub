<template>
    <div class="container mt-5" v-if="!selectedCategory">
        <!-- Section Title Start -->
        <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="section-title__title">Select <mark>Category</mark></h2>
        </div>
        <!-- Section Title End -->

        <div class="row g-6 justify-content-center">
            <div
                v-for="(each, index) in categories"
                class="col-xl-4 col-lg-4 col-sm-6"
                :key="index"
            >
                <!-- categories Item Start -->
                <div
                    class="categories-item"
                    data-aos="fade-up"
                    data-aos-duration="1000"
                    @click="selectCategory(each.id)"
                >
                    <div class="categories-item__link gap-2">
                        <div class="categories-item__icon category-image">
                            <img :src="`/${each.image}`" />
                        </div>
                        <div class="categories-item__info">
                            <h3 class="categories-item__name">
                                {{ each.name }}
                            </h3>
                        </div>
                    </div>
                </div>
                <!-- categories Item End -->
            </div>
        </div>
    </div>
    <div class="tab-content" id="translateTextTab" v-else>
        <div class="container">
            <h4 class="dashboard-title">Translation Text</h4>
        </div>
        <div
            class="tab-pane fade show active p-3 bg-white border shadow-sm rounded"
            id="textTranslator"
            role="tabpanel"
        >
            <h2 class="sr-only">Translate text</h2>
            <div class="d-flex flex-column p-2">
                <div class="row align-items-center">
                    <!-- Source Language Selector -->
                    <div
                        class="col-md-5 d-flex align-items-center position-relative"
                        v-on-clickaway="closeSourceModal"
                    >
                        <button
                            class="btn btn-outline-primary d-flex align-items-center w-100 text-truncate openLanguageModal"
                            @click="toggleModal('sourceLanguage')"
                            id="sourceLangBtn"
                        >
                            <span>{{
                                sourceLanguage
                                    ? sourceLanguage.name
                                    : "Select source language."
                            }}</span>
                            <i class="bi bi-chevron-down ms-auto"></i>
                        </button>
                        <LanguageModal
                            :languages="languages"
                            :type="'source'"
                            :selectedLanguage="sourceLanguage"
                            @selectLanguage="selectLanguage"
                            v-if="modal.sourceLanguage"
                        />
                    </div>

                    <!-- Swap Languages Button -->
                    <div class="col-md-2 px-2 text-center">
                        <button
                            class="btn btn-outline-success"
                            disabled
                            aria-label="Swap source with target language"
                        >
                            <i class="bi bi-arrow-left-right"></i>
                        </button>
                    </div>

                    <!-- Target Language Selector -->
                    <div
                        class="col-md-5 d-flex align-items-center position-relative"
                        v-on-clickaway="closeTargetModal"
                    >
                        <button
                            class="btn btn-outline-primary d-flex align-items-center w-100 text-truncate openLanguageModal"
                            id="targetLangBtn"
                            @click="toggleModal('targetLanguage')"
                        >
                            <span>{{
                                targetLanguage
                                    ? targetLanguage.name
                                    : "Select target language."
                            }}</span>
                            <i class="bi bi-chevron-down ms-auto"></i>
                        </button>
                        <LanguageModal
                            :languages="languages"
                            :type="'target'"
                            :selectedLanguage="targetLanguage"
                            @selectLanguage="selectLanguage"
                            v-if="modal.targetLanguage"
                        />
                    </div>
                </div>
                <div class="row translation-box">
                    <div class="col-md-6 source-box border-right py-3">
                        <div>
                            <h5 class="text-primary">Source Text</h5>
                            <textarea
                                type="text"
                                class="translation-input"
                                placeholder="Type to translate"
                                rows="1"
                                @input="handleTranslation"
                                v-model="sourceText"
                            ></textarea>
                            <p>Click the microphone to translate speech</p>
                        </div>
                        <audio-recorder
                            format="wav"
                            :pause-recording="callback"
                            :after-recording="callback"
                            :show-download-button="false"
                            :show-upload-button="false"
                        />
                    </div>
                    <div class="col-md-6 py-3 target-translation">
                        <div class="d-flex justify-content-between">
                            <h3 class="text-primary">Translation</h3>
                            <div @click="speakText">
                                <i class="bi bi-volume-up-fill"></i>
                            </div>
                        </div>
                        <p v-if="translating">Translating....</p>
                        <p v-else>
                            {{ targetText }}
                        </p>
                    </div>
                </div>

                <!-- Glossary Button
                <div class="d-none d-xl-block mt-3">
                    <button
                        id="glossary-button"
                        type="button"
                        class="btn btn-light w-100"
                    >
                        Glossary
                    </button>
                </div> -->
            </div>
        </div>
    </div>
</template>

<script>
import LanguageModal from "./LanguageModal.vue";
import { useDebounce } from "../utils/debounce";

export default {
    name: "Translation",
    components: {
        LanguageModal,
    },
    props: ["languages", "categories"],
    data() {
        return {
            sourceText: "",
            translating: false,
            targetText: "",
            isSpeaking: false,
            sourceLanguage: null,
            targetLanguage: null,
            selectedCategory: null,
            modal: {
                sourceLanguage: false,
                targetLanguage: false,
            },
        };
    },
    methods: {
        selectLanguage(type, language) {
            if (type == "source") {
                this.sourceLanguage = language;
            } else if (type == "target") {
                this.targetLanguage = language;
            }
            this.modal.sourceLanguage = false;
            this.modal.targetLanguage = false;
            if (this.sourceText != "") {
                this.translate();
            }
        },
        selectCategory(category_id) {
            this.selectedCategory = category_id;
        },
        handleTranslation: useDebounce(function () {
            this.translate();
        }, 700),
        async translate() {
            this.translating = true;
            const response = await axios.post("/dashboard/translate", {
                text: this.sourceText,
                source_lang: this.sourceLanguage
                    ? this.sourceLanguage.code
                    : "en",
                target_lang: this.targetLanguage
                    ? this.targetLanguage.code
                    : "en",
            });
            this.translating = false;
            if (
                response.data &&
                response.data.translations &&
                response.data.translations.length > 0
            ) {
                this.targetText = response.data.translations[0].text;

                await axios.post("/dashboard/store-translation", {
                    category_id: this.selectedCategory,
                    source_text: this.sourceText,
                    translated_text: this.targetText,
                    source_language: this.sourceLanguage
                        ? this.sourceLanguage.name
                        : "English",
                    target_language: this.targetLanguage
                        ? this.targetLanguage.name
                        : "English",
                });
            } else {
                this.targetText = "";
            }
        },
        speakText() {
            if (!this.targetText) {
                alert("Please translate some text first.");
                return;
            }

            // Stop any ongoing speech
            if (this.isSpeaking) this.isSpeaking = false;

            window.speechSynthesis.cancel();
            setTimeout(() => {
                const utterance = new SpeechSynthesisUtterance(this.targetText);
                utterance.lang = "en-US"; // Language setting, can be adjusted to any supported language
                utterance.rate = 0.2; // Speed of the speech, from 0.1 to 10
                utterance.pitch = 1; // Pitch of the voice, from 0 to 2

                // Event listeners for speech status
                utterance.onstart = () => (this.isSpeaking = true);
                utterance.onend = () => (this.isSpeaking = false);

                // Start speaking
                window.speechSynthesis.speak(utterance);
            }, 100);
        },
        toggleModal(type) {
            this.modal[type] = !this.modal[type];
        },
        closeTargetModal() {
            this.modal.targetLanguage = false;
        },
        closeSourceModal() {
            this.modal.sourceLanguage = false;
        },
        async callback(data) {
            if (data && data.blob) {
                try {
                    // Deepgram API key
                    const apiKey = process.env.MIX_DEEPGRAM_KEY;

                    const blob = new Blob([data.blob], { type: "audio/wav" });
                    this.translating = true;
                    fetch("https://api.deepgram.com/v1/listen", {
                        method: "POST",
                        headers: {
                            Authorization: `Token ${apiKey}`,
                            "Content-Type": "audio/wav",
                        },
                        body: blob,
                    })
                        .then(async (response) => {
                            let res = await response.json();
                            this.sourceText =
                                res.results.channels[0].alternatives[0].transcript;
                            this.translate();
                        })
                        .catch((e) => {
                            this.translating = false;
                            console.log(e);
                        });
                } catch (error) {
                    console.error("Transcription failed:", error);
                    this.transcription = "Transcription failed.";
                }
            }
        },
    },
};
</script>

<style></style>
