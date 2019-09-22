# php_colorlib
A simple PHP library for converting colors and create color gradients.

![#00ff00](https://placehold.it/15/00ff00/000000?text=+)
![#2eff00](https://placehold.it/15/2eff00/000000?text=+)
![#5dff00](https://placehold.it/15/5dff00/000000?text=+)
![#8bff00](https://placehold.it/15/8bff00/000000?text=+)
![#b9ff00](https://placehold.it/15/b9ff00/000000?text=+)
![#e8ff00](https://placehold.it/15/e8ff00/000000?text=+)
![#ffe800](https://placehold.it/15/ffe800/000000?text=+)
![#ffb900](https://placehold.it/15/ffb900/000000?text=+)
![#ff8b00](https://placehold.it/15/ff8b00/000000?text=+)
![#ff5d00](https://placehold.it/15/ff5d00/000000?text=+)
![#ff2e00](https://placehold.it/15/ff2e00/000000?text=+)
![#ff0000](https://placehold.it/15/ff0000/000000?text=+)

## Current version

This release allows to convert colors between RGB an HSV color modes. It also allows to create color gradients between two given colors and a number of steps between them.

## How it works

You can view some sample code in the test folder, but basically there are two functions.

#### Converting colors

```php
// New red color
$newColor = new RGB(255, 0, 0);

// Convert to HSV mode
$newHSV = $newColor->convertToHSV();

// Returns a HSV object with values Hue = 0.0, Saturation 1.0, Value = 1.0
```
You also can get the hexadecimal code for easy printing in a web page.

```php
$newColor = new RGB(100, 200, 150);
$hexString = $newColor->getHexaColorString();

// Returns a beautiful green #64c896
```
![#64c896](https://placehold.it/15/64c896/000000?text=+) `Beautiful green #64c896`

#### Getting gradients

Getting gradients is very easy too. Simply create 2 color objects, no matter wich mode.

Create a new Gradient object and pass the colors and the steps you want to create between colors. More steps creates a more gentle gradient.

The object will contain an array with the given length. Each position will be a HSV color.

```php
// First Color: green
$first = new RGB(0, 255, 0);

// Second Color: red
$second = new RGB(255, 0, 0);

// Create the gradient. If steps is not set, default value is 10.
$gradient = new Gradient($first, $second, 12);

// Loop the array

foreach ($gradient->getGradientArr() as $color) {
  // Get the color with $color->getHexaColorString();
}
```

It will return a 12 position array with these colors:

![#00ff00](https://placehold.it/15/00ff00/000000?text=+)
![#2eff00](https://placehold.it/15/2eff00/000000?text=+)
![#5dff00](https://placehold.it/15/5dff00/000000?text=+)
![#8bff00](https://placehold.it/15/8bff00/000000?text=+)
![#b9ff00](https://placehold.it/15/b9ff00/000000?text=+)
![#e8ff00](https://placehold.it/15/e8ff00/000000?text=+)
![#ffe800](https://placehold.it/15/ffe800/000000?text=+)
![#ffb900](https://placehold.it/15/ffb900/000000?text=+)
![#ff8b00](https://placehold.it/15/ff8b00/000000?text=+)
![#ff5d00](https://placehold.it/15/ff5d00/000000?text=+)
![#ff2e00](https://placehold.it/15/ff2e00/000000?text=+)
![#ff0000](https://placehold.it/15/ff0000/000000?text=+)

Here is a sample of diferent level gradients:

![Gradient sample](https://github.com/carlosdomingom/php_colorlib/blob/master/assets/img/gradient_samples.jpeg "Gradient Samples")
