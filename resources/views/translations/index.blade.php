@extends('layout.dashboard')
@section('content')
    <div class="dashboard-content">

        <div class="container">
            @if (!request()->get('category'))
                <h6 class="dashboard-title">Select Category</h6>
                <div class="row g-6 justify-content-center">
                    @foreach ($categories as $each)
                        <div class="col-xl-4 col-lg-4 col-sm-6">
                            <!-- categories Item Start -->
                            <div class="categories-item" data-aos="fade-up" data-aos-duration="1000">

                                <a href="{{ route('translation', ['category' => $each->id]) }}"
                                    class="categories-item__link gap-2">
                                    <div class="categories-item__icon category-image">
                                        <img src="{{ asset($each->image) }}" />
                                    </div>
                                    <div class="categories-item__info">
                                        <h3 class="categories-item__name">
                                            {{ $each->name }}
                                        </h3>
                                    </div>
                                </a>
                            </div>
                            <!-- categories Item End -->
                        </div>
                    @endforeach

                </div>
            @elseif(request()->get('category') && !request()->get('language'))
                <h6 class="dashboard-title">Select Language</h6>
                <div class="row g-6 justify-content-center">
                    @foreach ($languages as $each)
                        <div class="col-xl-4 col-lg-4 col-sm-6">
                            <!-- categories Item Start -->
                            <div class="categories-item" data-aos="fade-up" data-aos-duration="1000">

                                <a href="{{ route('translation', ['category' => request()->get('category'), 'language' => $each->name]) }}"
                                    class="categories-item__link gap-2">
                                    <div class="categories-item__info">
                                        <h3 class="categories-item__name">
                                            {{ $each->name }}
                                        </h3>
                                    </div>
                                </a>
                            </div>
                            <!-- categories Item End -->
                        </div>
                    @endforeach

                </div>
            @else
                <div class="d-flex justify-content-between flex-wrap">

                    <h4 class="dashboard-title">Translations</h4>
                    <div class="d-flex justify-content-end gap-2 flex-wrap">
                        <div class="btn btn-light btn-hover-primary speak-select-all d-flex gap-1"><i
                                class="bi bi-volume-up-fill"></i>
                            <div class="text">Speak</div>
                        </div>
                        <a href="{{ route('translation') }}" class="btn btn-danger">
                            Reset Filter
                        </a>
                    </div>
                </div>
                <div class="row g-6 justify-content-start">
                    @foreach ($translations as $each)
                        <div class="col-xl-4 col-lg-4 col-sm-6">
                            <!-- categories Item Start -->
                            <div class="categories-item" data-aos="fade-up" data-aos-duration="1000">
                                <div data-bs-toggle="modal" data-bs-target="#translationModal"
                                    class="categories-item__link gap-2 translation-modal-box"
                                    data-src="{{ json_encode($each) }}">
                                    <div class="categories-item__info">
                                        <h3 class="categories-item__name">
                                            {{ $each->translated_text }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <!-- categories Item End -->
                        </div>
                    @endforeach

                </div>

                <div class="modal fade" id="translationModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="translationModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="startQuizLabel">Translation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row translate-view">
                                    <div class="col-sm-6 mb-2">
                                        <div>Source Text</div>
                                        <h5 class="source-text"></h5>
                                    </div>
                                    <div class="col-sm-6 mb-2">
                                        <div>Translated Text</div>
                                        <h5 class="translated-text"></h5>
                                    </div>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('translate.delete') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" id="translateId" />
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary speak-translation">Speak</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!-- Dashboard Question & Answer Start -->

            <!-- Dashboard Question & Answer End -->
        </div>


    </div>
@endsection
@section('custom_script')
    <script>
        $(document).ready(function() {
            let isSpeakingSelected = false;

            $('.translation-modal-box').click(function(event) {
                var translation = JSON.parse($(this).attr('data-src'));
                if (translation) {
                    if (isSpeakingSelected) {
                        startSpeaking(translation.translated_text);
                    } else {
                        $('.source-text').html(translation.source_text);
                        $('.translated-text').html(translation.translated_text);
                        $('#translateId').val(translation.id);
                    }
                }
            });

            $('.speak-translation').click(function() {
                startSpeaking($('.translated-text').text());
            });

            $('.speak-select-all').click(function() {
                isSpeakingSelected = !isSpeakingSelected;

                if (isSpeakingSelected) {
                    $('.translation-modal-box').removeAttr('data-bs-toggle');
                    $('.speak-select-all .text').text('Stop');
                } else {
                    $('.translation-modal-box').attr('data-bs-toggle', 'modal');
                    $('.speak-select-all .text').text('Speak');
                }
            });
        });
    </script>
@endsection
