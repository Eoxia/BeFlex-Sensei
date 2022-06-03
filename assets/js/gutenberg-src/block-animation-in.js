function addHeadingAttribute(settings, name) {
  if (typeof settings.attributes !== 'undefined') {
    settings.attributes = Object.assign(settings.attributes, {
      animationIn: {
        type: 'boolean',
      },
      animationInType: {
        type: 'string',
        default: 'top',
      }
    });
  }
  return settings;
}

wp.hooks.addFilter(
  'blocks.registerBlockType',
  'beflex/heading-custom-attribute',
  addHeadingAttribute
);




const headingAdvancedControls = wp.compose.createHigherOrderComponent((BlockEdit) => {
  return (props) => {
    const { Fragment, useState } = wp.element;
    const { ToggleControl } = wp.components;
    const { RadioControl } = wp.components;
    const { InspectorAdvancedControls } = wp.blockEditor;
    const { attributes, setAttributes, isSelected } = props;

    return (
      <Fragment>
        <BlockEdit {...props} />
        {isSelected &&
        <InspectorAdvancedControls>

          <ToggleControl
            label={wp.i18n.__('Display IN animation', 'beflex-child')}
            help={
              attributes.animationIn
                ? 'Display IN animation'
                : 'No animation'
            }
            checked={!!attributes.animationIn}
            onChange={(newval) => setAttributes({ animationIn: !attributes.animationIn })}
          />

          { attributes.animationIn &&
          <RadioControl
            label={wp.i18n.__('Animation type', 'beflex-child')}
            selected={attributes.animationInType}
            help={'Choose the type of animation'}
            options={[
              { label: 'Top', value: 'top' },
              { label: 'Right', value: 'right' },
              { label: 'Bottom', value: 'bot' },
              { label: 'Left', value: 'left' },
              { label: 'Zoom In', value: 'scalein' },
              { label: 'Zoom Out', value: 'scaleout' }
            ]}
            onChange={ (option) => { setAttributes( { animationInType: option } ) } }
          />
          }

        </InspectorAdvancedControls>
        }
      </Fragment>
    );
  };
}, 'headingAdvancedControls');

wp.hooks.addFilter(
  'editor.BlockEdit',
  'beflex/heading-advanced-control',
  headingAdvancedControls
);



function headingApplyExtraClass(extraProps, blockType, attributes) {
  const { animationIn, animationInType } = attributes;

  let className = (extraProps.className != undefined) ? extraProps.className : '';

  if (typeof animationIn !== 'undefined' && animationIn) {
    className += ' bf-block-animatein';

    if ( animationInType ) {
      className += ' bf-block-animatein--type-' + animationInType;
    }
  }

  extraProps.className = className;

  return extraProps;
}

wp.hooks.addFilter(
  'blocks.getSaveContent.extraProps',
  'beflex/heading-apply-class',
  headingApplyExtraClass
);

