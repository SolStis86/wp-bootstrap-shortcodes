# wp-bootstrap-shortcodes
A set of shortcodes for use in WordPress that create Twitter Bootstrap components.

This is an ongoing bit of work which i will add to gradually.  Requests Welcome!

<h2>Current Shortcodes:</h2>

<h3>[bs_row]</h3>
Attributes: 
```
[bs_row]Row content[/bs_row]

```

<h3>[bs_col]</h3>
Attributes: cols (integer 1-12)
            offset (integer 1-11)
```
[bs_row]
    [bs_col cols="4"][/bs_col]
    [bs_col cols="4"][/bs_col]
    [bs_col cols="2" offset="2"][/bs_col]
[/bs_row]

```

<h3>[bs_badge]</h3>
Attributes: color [hex code]
```
[bs_badge]This is a badge[/bs_badge]
[bs_badge color="#ff0000"]This is a coloured badge[/bs_badge]
```

<h3>[bs_label]</h3>
Attributes: type [default | primary | success | info | warning | danger]
```
[bs_label]This is a default label[/bs_label]
[bs_label type="warning"]This is a warning label[/bs_label]
```

<h3>[bs_well]</h3>
Attributes: size [lg | sm]
```
[bs_well]This is a standard well[/bs_well]
[bs_well size="sm"]This is a small well[/bs_well]
```

<h3>[bs_panel]</h3>
Attributes: type [default | primary | success | info | warning | danger]
            title (string)
```
[bs_panel]This is a panel with no title or context...[/bs_panel]
[bs_panel type="danger" title="Panel Title"]This is the content of this panel with a title and context[/bs_panel]
```

<h3>[bs_tabs] <small>- [bs_pane]</small></h3>

Attributes: type [tabs | pills]
            stacked [false | true]
            justified [false | true]
```
[bs_tabs]
    [bs_pane title="First Panel Title"]First panel content...[/bs_pane]
    [bs_pane title="Second Panel Title"]Second panel content...[/bs_pane]
[/bs_tabs]

[bs_tabs type="pills" stacked="true" justified="false"]
    [bs_pane title="First Panel Title"]First panel content...[/bs_pane]
    [bs_pane title="Second Panel Title"]Second panel content...[/bs_pane]
[/bs_tabs]
```