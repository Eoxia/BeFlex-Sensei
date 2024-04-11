function hideOnMobileAttribute(settings, name) {
  if ( typeof settings.attributes !== 'undefined' ) {
    settings.attributes = Object.assign(settings.attributes, {
      hideOnMobile: {
        type: 'boolean',
      }
    });
  }
  return settings;
}

wp.hooks.addFilter(
  'blocks.registerBlockType',
  'beflex/hide-on-mobile',
  hideOnMobileAttribute
)

const hideOnMobileControls = wp.compose.createHigherOrderComponent((BlockEdit) => {
  return (props) => {
    const { Fragment } = wp.element;
    const { ToggleControl } = wp.components;
    const { InspectorAdvancedControls } = wp.blockEditor;
    const { attributes, setAttributes, isSelected } = props;
    return (
      <Fragment>
        <BlockEdit {...props} />
        {isSelected &&
        <InspectorAdvancedControls>
          <ToggleControl
            label={wp.i18n.__('Hide on mobile', 'beflex')}
            checked={!!attributes.hideOnMobile}
            onChange={(newval) => setAttributes({ hideOnMobile: !attributes.hideOnMobile })}
          />
        </InspectorAdvancedControls>
        }
      </Fragment>
    );
  };
}, 'hideOnMobileControls');

wp.hooks.addFilter(
  'editor.BlockEdit',
  'beflex/hide-on-mobile-control',
  hideOnMobileControls
);


function hideOnMobileClass(extraProps, blockType, attributes) {
  const { hideOnMobile } = attributes;

  if (typeof hideOnMobile !== 'undefined' && hideOnMobile) {
    extraProps.className = extraProps.className + ' hide-on-mobile';
  }
  return extraProps;
}

wp.hooks.addFilter(
  'blocks.getSaveContent.extraProps',
  'beflex/hide-on-mobile-class',
  hideOnMobileClass
);
