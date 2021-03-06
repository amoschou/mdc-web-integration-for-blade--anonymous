# Checkbox

## Use

```
<x-checkbox
    no-touch-target
    no-touch-target-wrapper
    disabled
    indeterminate
    checked
    no-js
    no-focus-ring
    name=""
    value=""
/>
```

## Examples

```
<x-checkbox></x-checkbox>

<x-checkbox checked></x-checkbox>

<x-checkbox indeterminate></x-checkbox>

<x-checkbox disabled></x-checkbox>
```

## Attributes

### Important attributes

| Name                      | Type    | Default value | Mandatory | Description                                                                                                                             |
|---------------------------|---------|---------------|-----------|-----------------------------------------------------------------------------------------------------------------------------------------|
| `disabled`                | boolean | `false`       | no        | If `true`, the checkbox will be disabled.                                                                                               |
| `checked`                 | boolean | `false`       | no        | If `true`, the checkbox will be checked.                                                                                                |
| `indeterminate`           | boolean | `false`       | no        | If `true`, the checkbox will be indeterminate.                                                                                          |
| `name`                    | string  | `null`        | no        | If present, sets the `name` for the checkbox.                                                                                           |
| `value`                   | string  | `null`        | no        | If present, sets the `value` for the checkbox.                                                                                          |

### Other attributes

| Name                      | Type    | Default value | Mandatory | Description                                                                                                                             |
|---------------------------|---------|---------------|-----------|-----------------------------------------------------------------------------------------------------------------------------------------|
| `no-touch-target`         | boolean | `false`       | no        | If `true`, the checkbox will not be touch accessible.                                                                                   |
| `no-touch-target-wrapper` | boolean | `false`       | no        | If `true`, the checkbox's touch target might overlap neighbouring items. *If the checkbox is not touch accessible, this has no effect.* |
| `no-js`                   | boolean | `false`       | no        | If `true`, `MDCCheckbox` will not be instantiated.                                                                                      |
| `no-focus-ring`           | boolean | `false`       | no        | If `true`, the focus ring will not be rendered.                                                                                         |

## Notes

Only one or none of `checked` or `indeterminate` can be set.

To include a label, wrap the checkbox in a form-field (Include `input-id` attribute to link label and checkbox together:
```
<x-form-field label="Checkbox one" input-id="checkbox-1">
    <x-checkbox checked></x-checkbox>
</x-form-field>
```
