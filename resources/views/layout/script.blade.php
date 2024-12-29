<script src="{{ asset('assets/js/vendor/modernizr-3.11.7.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>

<!-- Plugins JS -->
<script src="{{ asset('assets/js/plugins/aos.js') }}"></script>
<script src="{{ asset('assets/js/plugins/parallax.js') }}"></script>
<script src="{{ asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.powertip.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/jquery.sticky-kit.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/flatpickr.js') }}"></script>
<script src="{{ asset('assets/js/plugins/range-slider.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>

<!-- Activation JS -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
@include('layout.errors')
<script>
    function openLanguageModal(element) {
        $(element).toggle();
    }

    $('.translation-input').on('input', function() {
        $(this).css('height', 'auto');
        $(this).css('height', `${this.scrollHeight}px`);
    });

    var allTexts = [];

    let isSpeaking = false; // Track if currently speaking

    function entrySelected() {
        allTexts = [];
        $(".translation-checkbox:checked").each(function() {
            allTexts.push($(this).attr('data-text'));
        });
    }

    function startSpeaking(text) {
        window.speechSynthesis.cancel();

        setTimeout(() => {
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'en-US';
            utterance.rate = 0.2;
            utterance.pitch = 1;

            utterance.onstart = function() {
                isSpeaking = true;
            };

            utterance.onend = function() {
                isSpeaking = false;
                $('.speak-all .text').text('Speak');
            };

            utterance.onerror = function(event) {
                console.error("Speech synthesis error:", event);
                $('.speak-all .text').text('Speak');
                isSpeaking = false;
            };

            window.speechSynthesis.speak(utterance);
        }, 100); // Small delay to ensure cancel is processed
    }

    $(document).ready(function() {
        $('.select-all-translation').change(function() {
            if ($(this).is(':checked', true)) {
                $(".translation-checkbox").prop('checked', true);
            } else {
                $(".translation-checkbox").prop('checked', false);
            }
            entrySelected();
        });

        $(".translation-checkbox").change(function() {
            entrySelected();
        });

        let selectedLanguage = 'en-US';

        $('.speak-all').on('click', function() {
            if (allTexts.length == 0) {
                alert('Please select some translations first');
                return;
            }

            if (isSpeaking) {
                $('.speak-all .text').text('Speak');
                window.speechSynthesis.cancel();
            } else {
                $('.speak-all .text').text('Stop');
                // Cancel any ongoing speech synthesis
                startSpeaking(allTexts.toString());
            }
        });

        // Set up the speak button
        $('.speak').on('click', function() {
            const text = $(this).attr('data-text');

            if (!text) {
                alert("Please enter some text first.");
                return;
            }

            // Cancel any ongoing speech synthesis
            startSpeaking(text);
        });
    });
</script>
@yield('custom_script')