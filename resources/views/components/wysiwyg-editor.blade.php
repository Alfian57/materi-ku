@props(['name', 'value' => '', 'id' => null, 'placeholder' => ''])

@php
    $id = $id ?? $name;
@endphp

<div x-data="{
    content: @js($value ?? ''),
    quill: null,
    init() {
        const isDark = document.documentElement.classList.contains('dark');
        
        this.quill = new Quill(this.$refs.editor, {
            theme: 'snow',
            placeholder: '{{ $placeholder }}',
            modules: {
                toolbar: {
                    container: [
                        [{ 'header': [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'align': [] }],
                        ['link', 'image'],
                        ['clean']
                    ],
                    handlers: {
                        image: () => this.handleImageUpload()
                    }
                }
            }
        });
        
        // Set initial content
        if (this.content) {
            this.quill.root.innerHTML = this.content;
        }
        
        // Update hidden input on change
        this.quill.on('text-change', () => {
            this.content = this.quill.root.innerHTML;
        });
    },
    handleImageUpload() {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.click();
        
        input.onchange = async () => {
            const file = input.files[0];
            if (!file) return;
            
            const formData = new FormData();
            formData.append('file', file);
            formData.append('_token', '{{ csrf_token() }}');
            
            try {
                const response = await fetch('{{ route('dashboard.editor.upload-image') }}', {
                    method: 'POST',
                    body: formData,
                    credentials: 'same-origin'
                });
                
                const result = await response.json();
                
                if (result.location) {
                    const range = this.quill.getSelection(true);
                    this.quill.insertEmbed(range.index, 'image', result.location);
                    this.quill.setSelection(range.index + 1);
                } else {
                    alert(result.error || 'Upload gagal');
                }
            } catch (error) {
                alert('Upload gagal: ' + error.message);
            }
        };
    }
}" x-init>
    <div x-ref="editor" class="quill-editor"></div>
    <input type="hidden" name="{{ $name }}" x-model="content">
</div>

@once
    @push('styles')
        <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
        <style>
            .quill-editor {
                min-height: 300px;
            }

            .ql-container {
                border-radius: 0 0 0.75rem 0.75rem !important;
                border-color: rgb(var(--color-border)) !important;
                font-size: 1rem;
            }

            .ql-toolbar {
                border-radius: 0.75rem 0.75rem 0 0 !important;
                border-color: rgb(var(--color-border)) !important;
                background: rgb(var(--color-surface));
            }

            .dark .ql-toolbar {
                background: rgb(var(--color-card));
            }

            .dark .ql-container {
                background: rgb(var(--color-card));
                color: rgb(var(--color-text));
            }

            .dark .ql-editor.ql-blank::before {
                color: rgb(var(--color-text-muted));
            }

            .dark .ql-stroke {
                stroke: rgb(var(--color-text)) !important;
            }

            .dark .ql-fill {
                fill: rgb(var(--color-text)) !important;
            }

            .dark .ql-picker-label {
                color: rgb(var(--color-text)) !important;
            }

            .dark .ql-picker-options {
                background: rgb(var(--color-card)) !important;
                border-color: rgb(var(--color-border)) !important;
            }

            .dark .ql-picker-item {
                color: rgb(var(--color-text)) !important;
            }

            .ql-editor {
                min-height: 280px;
            }

            .ql-editor img {
                max-width: 100%;
                height: auto;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    @endpush
@endonce