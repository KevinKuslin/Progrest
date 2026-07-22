<div
    x-show="show"
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
        @click.outside="close()"
        class="bg-background rounded-3xl shadow-xl
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
                    class="
                        flex justify-center items-center
                        w-10 h-10
                        rounded-2xl
                        border-2
                        border-green-600
                        bg-mark-completed
                        shadow-[0_10px_30px_rgba(34,197,94,.18)]
                    "
                >
                    <x-lucide-handshake
                        class="w-5 h-5 text-green-600"
                    />
                </div>

                <div>
                    <h2 class="text-2xl font-bold font-montserrat text-text-primary">
                        Collaboration Details
                    </h2>
                    <p class="text-sm text-text-secondary font-montserrat">
                        View task collaboration information.
                    </p>
                </div>
            </div>


            <button
                @click="close()"
                class="
                    w-11 h-11
                    rounded-full
                    hover:bg-surface
                    transition
                    hover:rotate-90
                    flex items-center justify-center
                    cursor-pointer
                "
            >
                <x-lucide-x class="w-5 h-5"/>
            </button>
        </div>

        <!-- BODY -->
        <div
            class="
                flex-1 overflow-y-auto
                px-6 py-5
                font-montserrat
                space-y-6
            "
        >
            <!-- Task -->
            <div>
                <p class="text-xs font-semibold uppercase text-text-secondary">
                    Task
                </p>
                <div
                    class="
                        mt-2
                        bg-surface
                        rounded-2xl
                        px-5 py-4
                    "
                >
                    <h3
                        class="
                            font-semibold
                            text-lg
                            text-text-primary
                        "
                        x-text="collaboration.title"
                    ></h3>
                </div>
            </div>

            <!-- Reward + Limit -->
            <div class="grid md:grid-cols-2 gap-4">

                <!-- Reward -->
                <div
                    class="
                        bg-surface
                        rounded-2xl
                        p-5
                    "
                >

                    <div class="flex items-center gap-2 mb-3">
                        <x-lucide-coins class="w-5 h-5 text-primary"/>
                        <p class="font-semibold text-text-primary">
                            Reward
                        </p>
                    </div>

                    <div
                        class="
                            bg-background
                            rounded-xl
                            px-4 py-3
                        "
                    >
                        <p
                            class="text-text-secondary"
                            x-text="collaboration.go_collab_reward ?? 'No reward provided.'"
                        ></p>
                    </div>
                </div>

                <!-- Limit -->
                <div
                    class="
                        bg-surface
                        rounded-2xl
                        p-5
                    "
                >
                    <div class="flex items-center gap-2 mb-3">
                        <x-lucide-users class="w-5 h-5 text-primary"/>
                        <p class="font-semibold text-text-primary">
                            Collaborator Limit
                        </p>
                    </div>

                    <div
                        class="
                            bg-background
                            rounded-xl
                            px-4 py-3
                        "
                    >
                        <p
                            class="text-text-secondary"
                            x-text="collaboration.go_collab_limit + ' collaborators'"
                        ></p>
                    </div>
                </div>
            </div>

            <!-- External Collaborators -->
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <x-lucide-user-round-check
                        class="w-5 h-5 text-primary"
                    />
                    <p class="font-semibold text-text-primary">
                        Assigned Collaborators
                    </p>
                </div>

                <div
                    class="
                        bg-surface
                        rounded-2xl
                        p-5
                        space-y-3
                    "
                >
                    <template
                        x-for="member in collaboration.collaborators"
                        :key="member.id"
                    >
                        <div
                            class="
                                flex items-center gap-3
                                bg-background
                                rounded-xl
                                p-3
                            "
                        >
                            <img
                                :src="member.avatar"
                                class="
                                    w-9 h-9
                                    rounded-full
                                    object-cover
                                "
                            >
                            <div>
                                <p
                                    class="
                                        text-text-primary
                                        font-medium
                                    "
                                    x-text="member.name"
                                ></p>
                                <p
                                    class="
                                        text-sm
                                        text-text-secondary
                                    "
                                    x-text="member.email"
                                ></p>
                            </div>
                        </div>
                    </template>

                    <template
                        x-if="!collaboration.collaborators.length"
                    >
                        <p
                            class="
                                text-center
                                text-text-secondary
                                py-5
                            "
                        >
                            No external collaborators assigned.
                        </p>
                    </template>
                </div>
            </div>

            <!-- Collaboration Notes -->
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <x-lucide-notebook-pen
                        class="w-5 h-5 text-primary"
                    />
                    <p class="font-semibold text-text-primary">
                        Collaboration Notes
                    </p>
                </div>

                <div
                    class="
                        rounded-2xl
                        bg-surface
                        px-5 py-4
                        min-h-28
                    "
                >
                    <p
                        class="
                            leading-7
                            whitespace-pre-line
                            text-text-secondary
                        "
                        x-text="
                            collaboration.go_collab_description ||
                            'No collaboration notes provided.'
                        "
                    ></p>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="border-t-2 border-border px-6 py-5 font-montserrat">
            <template x-if="modalMode === 'available'">
                <div class="flex justify-end gap-3">
                    <button
                        @click="close()"
                        class="px-6 py-2 rounded-2xl border-2 border-border hover:bg-surface transition text-text-primary cursor-pointer"
                    >
                        Cancel
                    </button>

                    <button
                        @click="joinCollaboration()"
                        class="px-6 py-2 rounded-2xl bg-primary hover:bg-primary/90 text-white transition cursor-pointer"
                    >
                        Join Collaboration
                    </button>
                </div>
            </template>

            <template x-if="modalMode !== 'available'">
                <div class="flex justify-between">
                    <button
                        @click="leaveCollaboration()"
                        class="px-6 py-2 rounded-2xl
                            bg-red-accent
                            hover:bg-red-700
                            text-white
                            transition
                            cursor-pointer"
                    >
                        Leave Collaboration
                    </button>

                    <button
                        @click="close()"
                        class="px-6 py-2 rounded-2xl
                            border-2 border-border
                            hover:bg-surface
                            transition"
                    >
                        Close
                    </button>
                </div>
            </template>

        </div>
    </div>
</div>