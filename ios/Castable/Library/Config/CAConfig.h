//
//  CAConfig.h
//  Castable
//
//  Created by Mike Riley on 2/23/18.
//  Copyright © 2018 Panopsis. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "CASingletons.h"

@interface CAConfig : NSObject

- (NSURL *)apiURI;

CA_DECLARE_SINGLETON(Config)

@end
