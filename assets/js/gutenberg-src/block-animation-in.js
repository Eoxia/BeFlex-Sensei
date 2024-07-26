// Declare
const bfCheckNamespace = ( name ) => {
  const namespace = [ { name: 'core/' }, { name: 'beflex/' } ];
  for ( let i = 0; namespace.length > i; i++) {
    if ( name.startsWith( namespace[i].name ) ) {
      return true;
    }
  }
  return false;
}

const bfAnimationInAttributes = ( settings, name ) => {

  if ( ! bfCheckNamespace(name) ) {
    return settings;
  }

  return Object.assign( {}, settings, {
    attributes: Object.assign( {}, settings.attributes, {
      animationIn: { type: 'boolean' },
      animationInType: { type: 'string' }
    } ),
  } );
};

wp.hooks.addFilter(
  'blocks.registerBlockType',
  'beflex/animation-in-attributes',
  bfAnimationInAttributes
);


const { createHigherOrderComponent } = wp.compose;

const bfAnimationInControls = createHigherOrderComponent( ( BlockEdit ) => {
  return ( props ) => {
    const { Fragment, useState } = wp.element;
    const { ToggleControl, RadioControl, TextControl } = wp.components;
    const { InspectorAdvancedControls } = wp.blockEditor;
    const { attributes, setAttributes, isSelected } = props;
    const { animationIn, animationInType } = attributes;

    if ( ! bfCheckNamespace(props.name) ) {
      return (
        <BlockEdit { ...props } />
      );
    }

    return (
      <Fragment>
        <BlockEdit {...props} />
        {isSelected &&
          <InspectorAdvancedControls>

            <ToggleControl
              label={ wp.i18n.__('Display IN animation', 'beflex') }
              help={
                animationIn
                  ? 'Display IN animation'
                  : 'No animation'
              }
              checked={ animationIn }
              onChange={ () => setAttributes({ animationIn: !animationIn }) }
            />

            { animationIn &&
              <RadioControl
                label={ wp.i18n.__( 'Animation type', 'beflex' ) }
                help={ 'Choose the type of animation' }
                selected={ animationInType }
                options={ [
                  { label: 'Top', value: 'top' },
                  { label: 'Right', value: 'right' },
                  { label: 'Bottom', value: 'bot' },
                  { label: 'Left', value: 'left' },
                  { label: 'Zoom In', value: 'scalein' },
                  { label: 'Zoom Out', value: 'scaleout' }
                ] }
                onChange={ ( option ) => setAttributes({ animationInType: option }) }
              />
            }

          </InspectorAdvancedControls>
        }
      </Fragment>
    );
  };
}, 'bfAnimationInControls');

wp.hooks.addFilter(
  'editor.BlockEdit',
  'beflex/animation-in-controls',
  bfAnimationInControls
);


const bfAnimationInProp = createHigherOrderComponent( ( BlockListBlock ) => {
  return ( props ) => {
    if ( ! bfCheckNamespace(props.name) ) {
      return (
        <BlockListBlock { ...props } />
      );
    }

    return (
      <BlockListBlock
        { ...props }
        className={ 'bf-block-animatein bf-block-animatein--type-' + props.animationInType }
      />
    );
  };
}, 'bfAnimationInProp' );

wp.hooks.addFilter(
  'editor.BlockListBlock',
  'beflex/animation-in-prop',
  bfAnimationInProp
);


import classnames from 'classnames';
const bfAnimationInDisplay = ( extraProps, blockType, attributes ) => {
  const { animationIn, animationInType } = attributes;
  if ( animationIn && animationInType ) {
    extraProps.className = classnames( extraProps.className, 'bf-block-animatein bf-block-animatein--type-' + animationInType  );
  }

  return extraProps;
};

wp.hooks.addFilter(
  'blocks.getSaveContent.extraProps',
  'beflex/animation-in-display',
  bfAnimationInDisplay
);
