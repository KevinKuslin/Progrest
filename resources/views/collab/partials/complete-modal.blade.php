<div
    x-show="showCompleteModal"
    x-cloak
    x-transition.opacity
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm p-6"
>
    <div
        class="absolute -top-24 left-3/4
            h-64 w-86
            -translate-x-1/2
            rounded-full
            bg-green-300/15
            blur-3xl"
    ></div>

    <div
        @click.outside="closeComplete()"
        class="bg-background
            rounded-3xl
            shadow-xl
            w-full
            max-w-2xl
            max-h-[90vh]
            flex
            flex-col
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
                    <x-lucide-badge-check
                        class="w-5 h-5 text-green-600"
                    />
                </div>

                <div>

                    <h1
                        class="font-montserrat
                            text-2xl
                            font-bold
                            text-text-primary"
                    >
                        Submit for Review
                    </h1>

                    <p
                        class="text-sm
                            font-montserrat
                            text-text-secondary"
                    >
                        Submit your completed work for leader verification.
                    </p>
                </div>
            </div>

            <button
                @click="closeComplete()"
                class="w-12 h-12
                    rounded-full
                    hover:bg-surface
                    flex
                    items-center
                    justify-center
                    transition
                    cursor-pointer"
            >
                <x-lucide-x
                    class="w-5 h-5 text-text-primary"
                />
            </button>
        </div>

        <!-- BODY -->
        <div
            class="flex-1
                overflow-y-auto
                px-6
                py-5
                space-y-5"
        >
            <!-- Collaboration -->
            <div
                class="bg-surface
                    rounded-2xl
                    p-5"
            >
                <p
                    class="text-xs
                        font-semibold
                        uppercase
                        tracking-wider
                        text-text-secondary"
                >
                    Task
                </p>

                <h2
                    class="mt-2
                        text-xl
                        font-bold
                        font-montserrat
                        text-text-primary"
                    x-text="collaboration.title"
                ></h2>

                <div class="flex gap-2 mt-4">
                    <span
                        class="px-3
                            py-1
                            rounded-full
                            text-white
                            text-xs
                            font-semibold
                            capitalize"
                        :class="
                            collaboration.priority === 'high'
                            ? 'bg-red-accent'
                            : collaboration.priority === 'Medium'
                            ? 'bg-yellow-accent'
                            : 'bg-quartiary'
                        "
                        x-text="
                            collaboration.priority === 'high'
                            ? 'Priority: High'
                            : collaboration.priority === 'Medium'
                            ? 'Priority: Medium'
                            : 'Priority: Low'
                        "
                    ></span>

                    <span
                        class="px-3
                            py-1
                            rounded-full
                            bg-background
                            text-text-primary
                            text-xs"
                        x-text="
                            collaboration.go_collab_reward + ' Credit Point'
                        "
                    ></span>
                </div>
            </div>

            <!-- Team Submission -->
            <div
                class="bg-mark-completed
                    rounded-2xl
                    p-5
                    font-montserrat"
            >
                <div class="flex gap-4">
                    <div
                        class="w-10
                            h-10
                            rounded-xl
                            bg-white/60
                            flex
                            items-center
                            justify-center
                            shrink-0"
                    >
                        <x-lucide-users
                            class="w-5 h-5 text-green-700"
                        />
                    </div>

                    <div>
                        <h3
                            class="font-semibold
                                text-text-primary"
                        >
                            Team Submission
                        </h3>

                        <p
                            class="text-sm
                                text-text-secondary
                                mt-1
                                leading-6"
                        >
                            This submission represents the work completed by the
                            collaborators. Once submitted, the task will enter
                            <strong>Pending Review</strong> until the project
                            leader approves or rejects it.
                        </p>
                    </div>
                </div>
            </div>

            <div class="border-t-2 border-border"></div>

            <!-- Upload -->
            <div
                class="bg-surface
                    rounded-2xl
                    p-5
                    font-montserrat
                    space-y-4"
            >
                <div class="flex items-center gap-2">
                    <x-lucide-image-plus
                        class="w-5 h-5 text-green-600"
                    />
                    <h3 class="font-semibold text-text-primary">
                        Proof of Completion
                    </h3>
                </div>

                <label
                    class="border-2
                        border-dashed
                        border-border
                        rounded-2xl
                        h-60
                        cursor-pointer
                        hover:border-primary
                        transition
                        flex
                        flex-col
                        justify-center
                        items-center
                        bg-background
                        overflow-hidden"
                >
                    <template x-if="!submissionForm.preview">
                        <div class="flex flex-col items-center">
                            <x-lucide-upload-cloud
                                class="w-12 h-12 text-text-secondary"
                            />
                            <p class="mt-4 font-semibold text-text-primary">
                                Click to upload an image
                            </p>
                            <p class="text-sm text-text-secondary">
                                PNG • JPG • JPEG
                            </p>
                        </div>
                    </template>
                    <template x-if="submissionForm.preview">

                        <img
                            :src="submissionForm.preview"
                            class="w-full h-full object-cover"
                        />
                    </template>
                    <input
                        type="file"
                        accept="image/*"
                        class="hidden"
                        @change="previewSubmissionImage"
                    >
                </label>
            </div>

            <!-- Link -->
            <div
                class="bg-surface
                    rounded-2xl
                    p-5
                    font-montserrat
                    space-y-4"
            >
                <div class="flex items-center gap-2">
                    <x-lucide-link
                        class="w-5 h-5 text-green-600"
                    />
                    <h3 class="font-semibold text-text-primary">
                        Submission Link
                    </h3>
                </div>

                <input
                    type="url"
                    x-model="submissionForm.link"
                    placeholder="https://github.com/your-project"
                    class="w-full
                        rounded-2xl
                        bg-background
                        px-5
                        py-3
                        outline-none
                        text-text-primary
                        border
                        border-border
                        focus:border-primary"
                >
            </div>

            <!-- Notes -->
            <div
                class="bg-surface
                    rounded-2xl
                    p-5
                    font-montserrat
                    space-y-4"
            >
                <div class="flex items-center gap-2">
                    <x-lucide-square-pen
                        class="w-5 h-5 text-green-600"
                    />
                    <h3 class="font-semibold text-text-primary">
                        Additional Notes
                    </h3>
                </div>

                <textarea
                    rows="5"
                    x-model="submissionForm.notes"
                    placeholder="Describe what has been completed..."
                    class="w-full
                        rounded-2xl
                        bg-background
                        px-5
                        py-4
                        resize-none
                        text-text-primary
                        border
                        border-border
                        focus:border-primary"
                ></textarea>
            </div>
        </div>

        <!-- FOOTER -->
        <div
            class="flex
                justify-end
                gap-3
                px-6
                py-5
                border-t-2
                border-border
                font-montserrat"
        >

            <button
                @click="closeComplete()"
                class="px-6
                    py-3
                    rounded-2xl
                    border-2
                    border-border
                    hover:bg-surface
                    transition
                    text-text-primary"
            >
                Cancel
            </button>

            <button
                @click="submitTask()"
                :disabled="!submissionForm.image && !submissionForm.link"
                :class="(!submissionForm.image && !submissionForm.link)
                    ? 'opacity-50 cursor-not-allowed'
                    : ''"
                class="px-7
                    py-3
                    rounded-2xl
                    bg-quartiary
                    hover:bg-quartiary-hover
                    text-white
                    transition"
            >
                <div class="flex items-center gap-2">
                    <x-lucide-send class="w-4 h-4"/>
                    <span>
                        Submit for Review
                    </span>
                </div>
            </button>
        </div>
    </div>
</div>