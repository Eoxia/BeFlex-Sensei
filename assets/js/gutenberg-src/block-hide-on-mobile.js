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

const bfHideOnMobileAttributes = ( settings, name ) => {
  if ( ! bfCheckNamespace(name) ) {
    return settings;
  }
  return Object.assign( {}, settings, {
    attributes: Object.assign( {}, settings.attributes, {
      hideOnMobile: { type: 'boolean' }
    } ),
  } );
};

wp.hooks.addFilter(
  'blocks.registerBlockType',
  'beflex/hide-on-mobile-attributes',
  bfHideOnMobileAttributes
);


const { createHigherOrderComponent } = wp.compose;

const bfHideOnMobileControls = createHigherOrderComponent( ( BlockEdit ) => {
  return ( props ) => {
    const { Fragment, useState } = wp.element;
    const { ToggleControl, RadioControl, TextControl } = wp.components;
    const { InspectorAdvancedControls } = wp.blockEditor;
    const { attributes, setAttributes, isSelected } = props;
    const { hideOnMobile } = attributes;

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
              label={wp.i18n.__('Hide on mobile', 'beflex')}
              checked={!!hideOnMobile}
              onChange={ () => setAttributes({ hideOnMobile: !hideOnMobile }) }
            />
          </InspectorAdvancedControls>
        }
      </Fragment>
    );
  };
}, 'bfHideOnMobileControls');

wp.hooks.addFilter(
  'editor.BlockEdit',
  'beflex/hide-on-mobile-controls',
  bfHideOnMobileControls
);

const bfHideOnMobileProp = createHigherOrderComponent( ( BlockListBlock ) => {
  return ( props ) => {
    if ( ! bfCheckNamespace(props.name) ) {
      return (
        <BlockListBlock { ...props } />
      );
    }

    return (
      <BlockListBlock
        { ...props }
        className={ 'hide-on-mobile' }
      />
    );
  };
}, 'bfHideOnMobileProp' );

wp.hooks.addFilter(
  'editor.BlockListBlock',
  'beflex/hide-on-mobile-prop',
  bfHideOnMobileProp
);


import classnames from 'classnames';
const bfHideOnMobileDisplay = ( extraProps, blockType, attributes ) => {
  const { hideOnMobile } = attributes;
  if ( hideOnMobile ) {
    extraProps.className = classnames( extraProps.className, 'hide-on-mobile'  );
  }

  return extraProps;
};

wp.hooks.addFilter(
  'blocks.getSaveContent.extraProps',
  'beflex/hide-on-mobile-display',
  bfHideOnMobileDisplay
);
