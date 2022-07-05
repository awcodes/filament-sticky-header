## Filament Sticky Header

:bangbang: Does not work in Safari < v16.

A Filament Admin plugin to make headers sticky when scrolling.

## Installation

Install packages via composer

```bash
composer require awcodes/filament-sticky-header
```

To enable buttons in the sticky header, you will need to overwrite the getActions method in the EditRecord class

```php
protected function getActions(): array
    {
        $resource = static::getResource();

        return array_merge(
            [Action::make('save')->action('save')],
            (($resource::hasPage('view') && $resource::canView($this->getRecord())) ? [$this->getViewAction()] : []),
            ($resource::canDelete($this->getRecord()) ? [$this->getDeleteAction()] : []),
        );
}
```

![screenshot in light mode](./images/screenshot-light.png)

![screenshot in dark mode](./images/screenshot-dark.png)
