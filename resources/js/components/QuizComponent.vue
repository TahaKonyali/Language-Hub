<template>
    <div class="quiz-container">
        <div class="question-wrapper" v-if="currentQuestion">
            <div class="form-title">{{ this.language }} Language Quiz</div>

            <div class="question-block">
                <span class="number"> {{ questionIndex + 1 }}. </span>
                {{ currentQuestion.question }}
            </div>

            <div class="options-wrapper">
                <div
                    :class="`single-option ${(answerSubmitted && option.toLowerCase() == currentQuestion.correct_answer.toLowerCase()) ? 'correct' : ''} ${(answerSubmitted && option.toLowerCase() == selectedAnswer.toLowerCase() && option.toLowerCase() != currentQuestion.correct_answer.toLowerCase()) ? 'wrong' : '' }`"
                    v-for="(option, index) in currentQuestion.options"
                    :key="index"
                >
                    <input
                        :id="index"
                        type="radio"
                        v-model="selectedAnswer"
                        :value="option"
                        :name="`option-${index}`"
                        :disabled="answerSubmitted"
                    />
                    <label :for="index">{{ option }}</label>
                </div>
            </div>
            <div class="text-end">
                <button
                    type="button"
                    class="btn btn-primary"
                    v-if="submitingResult"
                >
                    Please wait...
                </button>
                <button
                    type="button"
                    class="btn btn-primary"
                    v-else-if="!answerSubmitted"
                     @click="nextQuestion"
                >
                    Check
                </button>
                <button
                    type="button"
                    @click="nextQuestion"
                    class="btn btn-primary"
                    v-else
                >
                    {{
                        (this.questionIndex < this.totalQuestions - 1)
                            ? "Next"
                            : "Submit"
                    }}
                </button>
            </div>
        </div>

        <div class="quiz-footer">
            <div class="progress-wrapper">
                <div class="current-position">
                    <span>
                        {{ questionAttempted.length }} / {{ totalQuestions }}
                    </span>
                    <span> {{ completed }}% </span>
                </div>
                <div class="progress">
                    <div
                        class="progress-width"
                        :style="{ width: `${completed}%` }"
                    ></div>
                </div>
            </div>
        </div>
        <!---->
    </div>
</template>

<script>
export default {
    name: "Quiz",
    props: ["questions", "language"],
    data() {
        return {
            submitingResult: false,
            questionIndex: 0,
            totalQuestions: 0,
            answers: [],
            selectedAnswer: null,
            questionAttempted: [],
            answerSubmitted: false
        };
    },
    computed: {
        currentQuestion() {
            return this.questions.length > 0
                ? this.questions[this.questionIndex]
                : null;
        },
        completed() {
            return (this.questionAttempted.length / this.totalQuestions) * 100;
        },
    },
    mounted() {
        this.totalQuestions = this.questions.length;
    },
    methods: {
        nextQuestion() {
            if (this.selectedAnswer !== null) {
                if (this.answerSubmitted) {
                    if (this.questionIndex < this.totalQuestions - 1) {
                        this.questionIndex++;
                        this.selectedAnswer = null;
                        this.answerSubmitted = false;
                    } else {
                        this.submitingResult = true;
                        this.submitResult();
                    }
                } else {
                    let correct =
                        this.selectedAnswer.toLowerCase() ==
                        this.currentQuestion.correct_answer.toLowerCase();
                    this.questionAttempted.push({
                        ...this.currentQuestion,
                        selected_answer: this.selectedAnswer,
                        correct: correct,
                    });
                    this.answerSubmitted = true;
                }
            } else {
                alert("Please select an answer before continuing.");
            }
        },
        async submitResult() {
            const correct = this.questionAttempted.filter(
                (item) => item.correct == true
            );
            const response = await axios.post("/dashboard/mark-quiz-result", {
                questions: this.questionAttempted,
                language: this.language,
                total_question: this.totalQuestions,
                correct: correct.length,
                wrong: this.totalQuestions - correct.length,
            });
            if (response.status == 200) {
                window.location.href = `${response.data}`;
            } else {
                alert("Something went wrong");
            }
            // this.translating = false;
        },
    },
};
</script>

<style></style>
