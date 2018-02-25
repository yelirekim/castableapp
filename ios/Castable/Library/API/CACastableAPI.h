//
//  CACastableAPI.h
//  Castable
//
//  Created by Mike Riley on 2/23/18.
//  Copyright © 2018 Panopsis. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "CASingletons.h"

typedef void (^CACastableAPIPodcastListResponseHandler) (NSArray *);

@interface CACastableAPI <CASingleton> : NSObject

CA_DECLARE_SINGLETON(CastableAPI)

- (void)start;

@end
