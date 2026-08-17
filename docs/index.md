---
title: Sticky Header
description: Keep a Filament panel's page header visible while scrolling.
---

# Sticky Header

Sticky Header pins a Filament page's header to the top of the viewport once you scroll past it, so the page title, breadcrumbs, and header actions stay reachable on long pages.

It applies to every page in the panel — resource pages, custom pages, dashboards — with no per-page setup.

## How it behaves

The header starts in its normal position. Once the page is scrolled far enough that the header would leave the viewport, it sticks, positioned just below the panel's topbar so the two never overlap.

Scrolling back to the top returns it to normal. Nothing is duplicated or re-rendered — it is the same header element, restyled.

## Themes

Three looks are available, chosen with the [`floating()` and `colored()`](configuration.md) methods:

| Theme | Appearance |
| --- | --- |
| Default | A full-width bar with a solid background and a bottom border |
| Floating | A rounded, translucent card inset from the page edges |
| Floating coloured | The floating card, filled with the panel's primary colour |

The default is used when neither method is called.

## Where it applies

Every page by default. Two methods narrow that:

- `stickOnListPages(false)` leaves list pages alone.
- `disabledOn([...])` switches it off for named pages.

Both are covered in [Configuration](configuration.md), along with the closures that let either decision be made at runtime.

## Next steps

Start with [Installation](installation.md).
