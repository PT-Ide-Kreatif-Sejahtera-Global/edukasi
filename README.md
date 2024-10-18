# 🎨 iDeaThings Color System Documentation

## 📚 Table of Contents

1. [Brand Colors](#brand-colors)
2. [Color Usage Guidelines](#color-usage-guidelines)
3. [Laravel Implementation](#laravel-implementation)
4. [CSS & Tailwind Configuration](#css--tailwind-configuration)
5. [SCSS Variables](#scss-variables)
6. [Components Example](#components-example)

## 🎯 Brand Colors

### Primary Palette

| Color Name    | Hex Code  | Preview                                                         | Usage            |
| ------------- | --------- | --------------------------------------------------------------- | ---------------- |
| Primary       | `#9ACD32` | ![#9ACD32](https://via.placeholder.com/15/9ACD32/000000?text=+) | Main brand color |
| Primary Dark  | `#7BA428` | ![#7BA428](https://via.placeholder.com/15/7BA428/000000?text=+) | Hover states     |
| Primary Light | `#B8E255` | ![#B8E255](https://via.placeholder.com/15/B8E255/000000?text=+) | Backgrounds      |

### Secondary Palette

| Color Name      | Hex Code  | Preview                                                         | Usage        |
| --------------- | --------- | --------------------------------------------------------------- | ------------ |
| Secondary       | `#FFD700` | ![#FFD700](https://via.placeholder.com/15/FFD700/000000?text=+) | CTA elements |
| Secondary Dark  | `#CCAC00` | ![#CCAC00](https://via.placeholder.com/15/CCAC00/000000?text=+) | Hover states |
| Secondary Light | `#FFE147` | ![#FFE147](https://via.placeholder.com/15/FFE147/000000?text=+) | Backgrounds  |

### Accent Colors

| Color Name  | Hex Code  | Preview                                                         | Usage      |
| ----------- | --------- | --------------------------------------------------------------- | ---------- |
| Accent Red  | `#FF4500` | ![#FF4500](https://via.placeholder.com/15/FF4500/000000?text=+) | Highlights |
| Accent Blue | `#1E90FF` | ![#1E90FF](https://via.placeholder.com/15/1E90FF/000000?text=+) | Links      |

## 🎯 Color Usage Guidelines

### State Colors

```
Success: #28A745 - Use for positive feedback
Warning: #FFA500 - Use for cautions and warnings
Error: #DC3545   - Use for error messages
Info: #17A2B8    - Use for informational messages
```

### Text Colors

```
Primary Text: #333333 - Main content
Secondary Text: #666666 - Supporting text
Disabled Text: #999999 - Inactive elements
```

## 💻 Laravel Implementation

### Configuration (config/colors.php)

```php
<?php

return [
    'brand' => [
        'primary' => [
            'default' => '#9ACD32',
            'dark' => '#7BA428',
            'light' => '#B8E255',
        ],
        'secondary' => [
            'default' => '#FFD700',
            'dark' => '#CCAC00',
            'light' => '#FFE147',
        ],
    ],
    'accent' => [
        'red' => '#FF4500',
        'blue' => '#1E90FF',
    ],
    'state' => [
        'success' => '#28A745',
        'warning' => '#FFA500',
        'error' => '#DC3545',
        'info' => '#17A2B8',
    ],
];
```

### Service Provider (app/Providers/ColorServiceProvider.php)

```php
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ColorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/colors.php' => config_path('colors.php'),
        ], 'colors');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/colors.php', 'colors'
        );
    }
}
```

## 🎨 CSS & Tailwind Configuration

### tailwind.config.js

```javascript
module.exports = {
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: "#9ACD32",
                    dark: "#7BA428",
                    light: "#B8E255",
                },
                secondary: {
                    DEFAULT: "#FFD700",
                    dark: "#CCAC00",
                    light: "#FFE147",
                },
                accent: {
                    red: "#FF4500",
                    blue: "#1E90FF",
                },
                state: {
                    success: "#28A745",
                    warning: "#FFA500",
                    error: "#DC3545",
                    info: "#17A2B8",
                },
            },
        },
    },
    plugins: [],
};
```

## 🎨 SCSS Variables

### resources/sass/\_variables.scss

```scss
// Brand Colors
$primary: #9acd32;
$primary-dark: #7ba428;
$primary-light: #b8e255;

$secondary: #ffd700;
$secondary-dark: #ccac00;
$secondary-light: #ffe147;

// Accent Colors
$accent-red: #ff4500;
$accent-blue: #1e90ff;

// State Colors
$success: #28a745;
$warning: #ffa500;
$error: #dc3545;
$info: #17a2b8;

// Text Colors
$text-primary: #333333;
$text-secondary: #666666;
$text-disabled: #999999;
```

## 💡 Components Example

### Blade Component (resources/views/components/button.blade.php)

```php
@props([
    'variant' => 'primary',
    'size' => 'md',
])

@php
$variantClasses = [
    'primary' => 'bg-primary hover:bg-primary-dark text-white',
    'secondary' => 'bg-secondary hover:bg-secondary-dark text-white',
    'danger' => 'bg-state-error hover:bg-red-700 text-white',
];

$sizeClasses = [
    'sm' => 'px-2 py-1 text-sm',
    'md' => 'px-4 py-2',
    'lg' => 'px-6 py-3 text-lg',
];
@endphp

<button {{ $attributes->merge([
    'class' => 'rounded-md transition-colors duration-200 ' .
    $variantClasses[$variant] . ' ' .
    $sizeClasses[$size]
]) }}>
    {{ $slot }}
</button>
```

### Usage in Blade Templates

```php
<x-button variant="primary" size="md">
    Click Me
</x-button>

<x-button variant="secondary" size="lg">
    Secondary Action
</x-button>

<x-button variant="danger" size="sm">
    Delete
</x-button>
```

## 📱 Responsive Design Considerations

### Media Query Breakpoints

```scss
// Small devices (phones)
@media (min-width: 640px) {
}

// Medium devices (tablets)
@media (min-width: 768px) {
}

// Large devices (desktops)
@media (min-width: 1024px) {
}

// Extra large devices
@media (min-width: 1280px) {
}
```

## 🔍 Best Practices

1. **Consistency**: Always use color variables instead of hardcoded values
2. **Accessibility**: Ensure color contrast meets WCAG 2.1 guidelines
3. **Dark Mode**: Consider implementing dark mode variants
4. **Documentation**: Keep this color documentation updated
5. **Component Library**: Build reusable components using these colors

## 🛠 Development Tools

-   Color Contrast Checker: [WebAIM Contrast Checker](https://webaim.org/resources/contrastchecker/)
-   Color Palette Generator: [Coolors](https://coolors.co/)
-   CSS Gradient Generator: [CSS Gradient](https://cssgradient.io/)
