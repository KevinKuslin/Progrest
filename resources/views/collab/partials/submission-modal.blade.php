<div
    x-show="showSubmissionModal"
    x-cloak
    x-transition.opacity
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm p-6"
>
    {{-- Green Accent --}}
    <div
        class="absolute -top-24 left-3/4
            h-64 w-86
            -translate-x-1/2
            rounded-full
            bg-green-300/15
            blur-3xl"
    ></div>

    <div
        @click.outside="closeSubmission()"
        class="bg-background
            rounded-3xl
            shadow-xl
            w-full max-w-2xl
            max-h-[90vh]
            flex flex-col
            overflow-hidden"
    >
        <!-- HEADER -->
        <div
            class="flex items-center justify-between
                px-6 py-5
                border-b-2 border-border
                shrink-0"
        >
            <div class="flex items-center gap-3">
                <div
                    class="flex justify-center items-center
                        w-10 h-10
                        rounded-2xl
                        border-2
                        border-green-600
                        bg-mark-completed
                        shadow-[0_10px_30px_rgba(34,197,94,.18)]"
                >
                    <x-lucide-view
                        class="w-5 h-5 text-green-600"
                    />
                </div>

                <div>
                    <h2
                        class="text-2xl
                            font-bold
                            font-montserrat
                            text-text-primary"
                    >
                        Submission Details
                    </h2>
                    <p
                        class="text-sm
                            text-text-secondary
                            font-montserrat"
                    >
                        Review the collaborator's submitted work.
                    </p>
                </div>
            </div>

            <button
                @click="closeSubmission()"
                class="w-11 h-11
                    rounded-full
                    hover:bg-surface
                    transition
                    z-101
                    text-text-primary
                    hover:rotate-90
                    flex
                    items-center
                    justify-center
                    cursor-pointer"
            >
                <x-lucide-x class="w-5 h-5"/>
            </button>
        </div>

        <!-- BODY -->
        <div
            class="flex-1
                overflow-y-auto
                px-6
                py-5
                font-montserrat
                space-y-6"
        >
            <!-- Task -->
            <div>
                <p
                    class="text-xs
                        font-semibold
                        uppercase
                        text-text-secondary"
                >
                    Task
                </p>

                <div
                    class="mt-2
                        bg-surface
                        rounded-2xl
                        px-5
                        py-4"
                >

                    <h3
                        class="font-semibold
                            text-lg
                            text-text-primary"
                        x-text="submission.title"
                    ></h3>
                </div>
            </div>

            <!-- Submission Info -->
            <div class="grid md:grid-cols-2 gap-4">

                <!-- Submitter -->
                <div
                    class="bg-surface
                        rounded-2xl
                        p-5"
                >
                    <div class="flex items-center gap-2 mb-3">
                        <x-lucide-user
                            class="w-5 h-5 text-primary"
                        />
                        <p class="font-semibold text-text-primary">
                            Submitted By
                        </p>
                    </div>

                    <div
                        class="flex items-center gap-3
                            bg-background
                            rounded-xl
                            p-2"
                    >
                        <img
                            :src="submission.submitter_avatar || '/images/default-avatar.png'"
                            class="w-8 h-8 rounded-full object-cover"
                        >
                        <p
                            class="text-text-secondary"
                            x-text="submission.submitter"
                        ></p>
                    </div>
                </div>

                <!-- Submitted Date -->
                <div
                    class="bg-surface
                        rounded-2xl
                        p-5"
                >
                    <div class="flex items-center gap-2 mb-3">
                        <x-lucide-calendar-days
                            class="w-5 h-5 text-primary"
                        />
                        <p class="font-semibold text-text-primary">
                            Submitted At
                        </p>
                    </div>
                    <div
                        class="flex items-center
                            bg-background
                            rounded-xl
                            py-2
                            px-4
                            min-h-12"
                    >
                        <p
                            class="text-text-secondary"
                            x-text="submission.submitted_at"
                        ></p>
                    </div>
                </div>
            </div>

            <!-- Proof Image -->
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <x-lucide-image
                        class="w-5 h-5 text-primary"
                    />
                    <p class="font-semibold text-text-primary">
                        Proof Image
                    </p>
                </div>

                <template x-if="submission.proof_image">
                    <img
                        :src="'/storage/' + submission.proof_image"
                        class="rounded-3xl
                            w-full
                            max-h-96
                            object-cover
                            border
                            border-border"
                    >
                </template>

                <template x-if="!submission.proof_image">
                    <div
                        class="rounded-2xl
                            bg-surface
                            py-10
                            text-center
                            text-text-secondary"
                    >
                        No proof image provided.
                    </div>
                </template>
            </div>

            <!-- Submission Link -->
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <x-lucide-link
                        class="w-5 h-5 text-primary"
                    />
                    <p class="font-semibold text-text-primary">
                        Submission Link
                    </p>
                </div>

                <template x-if="submission.proof_link">
                    <a
                        :href="submission.proof_link"
                        target="_blank"
                        class="block
                            rounded-2xl
                            bg-surface
                            px-5
                            py-4
                            text-primary
                            hover:underline
                            break-all"
                        x-text="submission.proof_link"
                    ></a>
                </template>

                <template x-if="!submission.proof_link">
                    <div
                        class="rounded-2xl
                            bg-surface
                            py-6
                            text-center
                            text-text-secondary"
                    >
                        No submission link.
                    </div>
                </template>
            </div>

            <!-- Notes -->
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <x-lucide-notebook-pen
                        class="w-5 h-5 text-primary"
                    />
                    <p class="font-semibold text-text-primary">
                        Notes
                    </p>
                </div>

                <div
                    class="rounded-2xl
                        bg-surface
                        px-5
                        py-4
                        min-h-28"
                >
                    <p
                        class="leading-7
                            whitespace-pre-line
                            text-text-secondary"
                        x-text="submission.notes || 'No notes provided.'"
                    ></p>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <div
            class="border-t-2
                border-border
                px-6
                py-5
                font-montserrat
                flex
                justify-end
                gap-3"
        >

            <!-- Leader Actions -->
            <template x-if="reviewMode">
                <div class="flex gap-3">
                    <button
                        @click="rejectSubmission()"
                        class="px-6
                            py-2
                            rounded-2xl
                            bg-red-accent
                            hover:bg-red-700
                            text-white
                            transition
                            cursor-pointer"
                    >
                        Reject
                    </button>
                    <button
                        @click="approveSubmission()"
                        class="px-6
                            py-2
                            rounded-2xl
                            bg-quartiary
                            hover:bg-emerald-700
                            text-white
                            transition
                            cursor-pointer"
                    >
                        Approve
                    </button>
                </div>
            </template>

            <button
                @click="closeSubmission()"
                class="px-6
                    py-2
                    rounded-2xl
                    border-2
                    border-border
                    hover:bg-surface
                    transition
                    text-text-primary
                    cursor-pointer"
            >
                Close
            </button>
        </div>
    </div>
</div>