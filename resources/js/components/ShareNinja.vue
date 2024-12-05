<template>
    <div class="mt-2" @click="copyToClipboard">
      <label
        for="ninja-share"
        class="block mb-1 px-2 text-sm font-medium text-orange-100 cursor-pointer"
        :title="'Click to copy: ' + shareUrl"
      >
        Share this Pizza Ninja:
      </label>
      <div class="relative">
        <input
          id="ninja-share"
          ref="ninjaShareInput"
          :value="shareUrl"
          class="block w-full text-neutral-500 rounded-md bg-white px-3 py-1.5 text-sm outline outline-1 -outline-offset-1 outline-gray-300 cursor-pointer"
          readonly
          @click.stop="copyToClipboard"
        >
        <button
          class="absolute top-1/2 right-2 transform -translate-y-1/2 p-2 cursor-pointer"
          :title="copied ? 'Copied!' : 'Copy to clipboard'"
          aria-label="Copy to clipboard"
          @click.stop="copyToClipboard"
        >
            <svg v-if="!copied" class="w-4 h-4 text-neutral-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                <path d="M384 336l-192 0c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l140.1 0L400 115.9 400 320c0 8.8-7.2 16-16 16zM192 384l192 0c35.3 0 64-28.7 64-64l0-204.1c0-12.7-5.1-24.9-14.1-33.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1L192 0c-35.3 0-64 28.7-64 64l0 256c0 35.3 28.7 64 64 64zM64 128c-35.3 0-64 28.7-64 64L0 448c0 35.3 28.7 64 64 64l192 0c35.3 0 64-28.7 64-64l0-32-48 0 0 32c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l32 0 0-48-32 0z"/>
            </svg>
            <svg v-else class="w-4 h-4 text-orange-500 animate-fade-in" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"/>
            </svg>
        </button>
      </div>
    </div>
  </template>

  <script>
  export default {
    name: 'ShareNinja',
    props: {
      initialUrl: {
        type: String,
        required: true
      }
    },
    data() {
      return {
        shareUrl: this.initialUrl,
        copied: false
      };
    },
    methods: {
      copyToClipboard() {
        navigator.clipboard.writeText(this.shareUrl).then(() => {
          this.copied = true;
          setTimeout(() => this.copied = false, 2000);
        }).catch(err => {
          console.error('Failed to copy text: ', err);
        });
      }
    }
  }
  </script>

  <style scoped>
    .animate-fade-in {
      animation: fadeIn 0.5s;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to   { opacity: 1; }
    }
  </style>
